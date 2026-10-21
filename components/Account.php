<?php namespace RainLab\User\Components;

use Cms;
use Auth;
use Flash;
use Request;
use Redirect;
use RainLab\User\Models\User;
use RainLab\User\Classes\ActionManager;
use Cms\Classes\ComponentBase;
use ApplicationException;
use ValidationException;
use ForbiddenException;

/**
 * Account component
 *
 * Allows users to update their account. They can also deactivate their account,
 * enable two-factor and resend the account verification email.
 *
 * @package rainlab\user
 * @author Alexey Bobkov, Samuel Georges
 */
class Account extends ComponentBase
{
    use \RainLab\User\Traits\ConfirmsPassword;

    /**
     * componentDetails
     */
    public function componentDetails()
    {
        return [
            'name' => "Account",
            'description' => "User management form for updating profile and security details."
        ];
    }

    /**
     * defineProperties
     */
    public function defineProperties()
    {
        return [
            'isDefault' => [
                'title' => 'Default View',
                'type' => 'checkbox',
                'description' => 'Use this page as the default entry point when verifying the email address.',
                'showExternalParam' => false
            ],
        ];
    }

    /**
     * onRun
     */
    public function onRun()
    {
        if ($redirect = $this->checkVerifyEmailRedirect()) {
            return $redirect;
        }

        // Validate zip/city correspondence
        $user = $this->user();
        if ($user && $user->zip && $user->city) {
            $postalCodeModel = \Rainlab\Location\Models\PostalCode::where('code', $user->zip)->first();
            
            if (!$postalCodeModel || $postalCodeModel->name !== $user->city) {
                // If mismatch, update city based on zip
                $user->city = $postalCodeModel ? $postalCodeModel->name : null;
                $user->save();
            }
        }
    }

    /**
     * onUpdateProfile information
     */
    public function onUpdateProfile()
    {
        $response = $this->actions()->updateProfile((array) post(), [
            'avatar' => files('avatar'),
            'removeAvatar' => post('remove_avatar'),
        ]);

        if ($response) {
            return $response;
        }

        if ($flash = Cms::flashFromPost(__("Your profile has been updated."))) {
            Flash::success($flash);
        }

        if ($redirect = Cms::redirectFromPost()) {
            return $redirect;
        }
    }

    /**
     * onVerifyEmail sends the verification email to the user
     */
    public function onVerifyEmail()
    {
        $this->actions()->sendVerifyEmail();

        if ($flash = Cms::flashFromPost(__("Please check your email for instructions."))) {
            Flash::success($flash);
        }

        $this->page['showLinkSent'] = true;
    }

    /**
     * onConfirmEmail is used
     */
    protected function onConfirmEmail()
    {
        try {
            $this->actions()->confirmVerifiedEmail(post('verify'));
        }
        catch (ApplicationException $ex) {
            throw new ValidationException([
                'verify' => $ex->getMessage(),
            ]);
        }

        $this->page['showSuccess'] = true;
    }

    /**
     * onEnableTwoFactor
     */
    public function onEnableTwoFactor()
    {
        if ($result = $this->checkConfirmedPassword()) {
            return $result;
        }

        $this->actions()->enableTwoFactor();

        $this->page['showConfirmation'] = true;
    }

    /**
     * onConfirmTwoFactor
     */
    public function onConfirmTwoFactor()
    {
        $this->actions()->confirmTwoFactor(post());

        $this->page['showRecoveryCodes'] = true;
    }

    /**
     * onShowTwoFactorRecoveryCodes
     */
    public function onShowTwoFactorRecoveryCodes()
    {
        if ($result = $this->checkConfirmedPassword()) {
            return $result;
        }

        $this->page['showRecoveryCodes'] = true;
    }

    /**
     * onRegenerateTwoFactorRecoveryCodes
     */
    public function onRegenerateTwoFactorRecoveryCodes()
    {
        $this->actions()->regenerateTwoFactorRecoveryCodes();

        $this->page['showRecoveryCodes'] = true;
    }

    /**
     * onDisableTwoFactor
     */
    public function onDisableTwoFactor()
    {
        if ($result = $this->checkConfirmedPassword()) {
            return $result;
        }

        $this->actions()->disableTwoFactor();
    }

    /**
     * onDeleteOtherSessions from storage.
     */
    protected function onDeleteOtherSessions()
    {
        $this->actions()->deleteOtherSessions(post());

        if ($flash = Cms::flashFromPost(__("Your other browser sessions have been logged out."))) {
            Flash::success($flash);
        }

        if ($redirect = Cms::redirectFromPost()) {
            return $redirect;
        }
    }

    /**
     * onDeleteUser
     */
    protected function onDeleteUser()
    {
        $this->actions()->deleteUser(post());

        if ($flash = Cms::flashFromPost(__("Your account has been removed from our system."))) {
            Flash::success($flash);
        }

        if ($redirect = Cms::redirectFromPost()) {
            return $redirect;
        }
    }

    /**
     * checkVerifyEmailRedirect verifies the email address using a code found in
     * the page URL, then redirects to remove the code
     */
    protected function checkVerifyEmailRedirect()
    {
        $verifyCode = get('verify');
        if (!$verifyCode) {
            return;
        }

        try {
            $this->actions()->confirmVerifiedEmail($verifyCode);

            if ($flash = Cms::flashFromPost(__("Thank you for verifying your email."))) {
                Flash::success($flash);
            }
        }
        catch (ApplicationException $ex) {
            Flash::error($ex->getMessage());
        }

        if (in_array(get('redirect'), ['0', 'false'])) {
            return;
        }

        $redirectUrl = rtrim(Request::fullUrlWithQuery(['verify' => null]), '?');
        return Redirect::to($redirectUrl);
    }

    /**
     * user returns the logged in user
     */
    public function user(): ?User
    {
        return Auth::user();
    }

    /**
     * sessions returns browser sessions for the user
     */
    public function sessions(): array
    {
        return $this->actions()->getBrowserSessions();
    }

    /**
     * twoFactorEnabled returns true if the user has two factor enabled
     */
    public function twoFactorEnabled(): bool
    {
        return $this->actions()->hasTwoFactorEnabled();
    }

    /**
     * twoFactorRecoveryCodes returns an array of recovery codes, if available
     */
    public function twoFactorRecoveryCodes(): array
    {
        return $this->actions()->getTwoFactorRecoveryCodes();
    }

    /**
     * actions returns user workflow services hosted by this component
     */
    protected function actions(): ActionManager
    {
        return ActionManager::instance()->withContext($this);
    }

    /**
     * getCountryList returns a list of countries for the dropdown
     */
    public function getCountryList()
    {
        return \Rainlab\Location\Models\Country::getNameList();
    }

    /**
     * onLookupPostalCode looks up the city based on the postal code
     */
    public function onLookupPostalCode()
    {
        $postalCode = post('zip');
        
        if (!$postalCode) {
            return [
                'city' => ''
            ];
        }

        $postalCodeModel = \Rainlab\Location\Models\PostalCode::where('code', $postalCode)->first();
        
        return [
            'city' => $postalCodeModel ? $postalCodeModel->name : ''
        ];
    }

    /**
     * onUpdateCountry automatically saves country selection
     */
    public function onUpdateCountry()
    {
        $user = $this->user();
        if (!$user) {
            throw new ForbiddenException;
        }

        $countryId = (int) post('country_id');
        if (!$countryId) {
            throw new ValidationException(['country_id' => 'Please select a valid country']);
        }

        $user->country_id = $countryId;
        $user->save();

        Flash::success(__("Land er oppdatert"));
    }

    /**
     * onUpdateZip handles zip code updates and city lookup
     */
    public function onUpdateZip()
    {
        $user = $this->user();
        if (!$user) {
            throw new ForbiddenException;
        }

        $zip = post('zip');
        
        if (!$zip) {
            $user->zip = null;
            $user->city = null;
            $user->save();

            Flash::warning(__("Adresse er fjernet"));
            return [
                'city' => ''
            ];
        }

        $postalCodeModel = \Rainlab\Location\Models\PostalCode::where('code', $zip)->first();
        
        if (!$postalCodeModel) {
            throw new ValidationException(['zip' => 'Ugyldig postnummer']);
        }

        $user->zip = $zip;
        $user->city = $postalCodeModel->name;
        $user->save();

        Flash::success(__("Adresse er oppdatert"));
        return [
            '#cityResult' => $this->renderPartial('@_cityresult', ['city' => $user->city])
        ];
    }

    /**
     * getPostalCodeList returns a list of postal codes for the select2 dropdown
     */
    public function getPostalCodeList()
    {
        return \Rainlab\Location\Models\PostalCode::orderBy('code')
            ->get()
            ->pluck('name', 'code')
            ->toArray();
    }
}
