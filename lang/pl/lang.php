<?php return [
  'plugin' => [
    'tab' => 'Użytkownicy',
    'access_users' => 'Zarządzaj użytkownikami',
    'access_groups' => 'Zarządzaj grupami użytkowników',
    'access_settings' => 'Zarządzaj ustawieniami użytkownika',
    'impersonate_user' => 'Wcielaj się w użytkowników',
  ],
  'users' => [
    'all_users' => 'Wszyscy użytkownicy',
    'new_user' => 'Nowy użytkownik',
    'trashed_hint_title' => 'Użytkownik dezaktywował swoje konto',
    'trashed_hint_desc' => 'Ten użytkownik dezaktywował swoje konto i nie chce już wyświetlać się na stronie. Może przywrócić konto w dowolnym momencie, logując się z powrotem.',
    'banned_hint_title' => 'Użytkownik został zbanowany',
    'banned_hint_desc' => 'Ten użytkownik został zbanowany przez administratora i nie będzie mógł się zalogować.',
    'guest_hint_title' => 'To jest użytkownik gościnny',
    'guest_hint_desc' => 'Ten użytkownik jest przechowywany wyłącznie w celach informacyjnych i musi się zarejestrować przed zalogowaniem.',
    'activate_warning_title' => 'Użytkownik nie aktywowany!',
    'activate_warning_desc' => 'Ten użytkownik nie został aktywowany i może nie być w stanie się zalogować.',
    'activate_confirm' => 'Czy na pewno chcesz aktywować tego użytkownika?',
    'activated_success' => 'Użytkownik został aktywowany',
    'activate_manually' => 'Aktywuj tego użytkownika ręcznie',
    'convert_guest_confirm' => 'Konwertuj tego gościa do użytkownika?',
    'convert_guest_manually' => 'Konwertuj na zarejestrowanego użytkownika',
    'convert_guest_success' => 'Użytkownik został przekonwertowany na zarejestrowanego',
    'impersonate_user' => 'Wciel się w użytkownika',
    'impersonate_confirm' => 'Wcielić się w tego użytkownika? Możesz powrócić do pierwotnego stanu wylogowując się.',
    'impersonate_success' => 'Wcielasz się w tego użytkownika',
    'delete_confirm' => 'Czy na pewno chcesz usunąć tego użytkownika?',
    'unban_user' => 'Odbanuj tego użytkownika',
    'unban_confirm' => 'Czy na pewno chcesz odbanować tego użytkownika?',
    'unbanned_success' => 'Użytkownik został odbanowany',
    'return_to_list' => 'Wróć do listy użytkowników',
    'update_details' => 'Zaktualizuj szczegóły',
    'delete_selected' => 'Usuń wybrane',
    'delete_selected_confirm' => 'Usunąć wybranych użytkowników?',
    'delete_selected_empty' => 'Nie ma wybranych użytkowników do usunięcia.',
    'delete_selected_success' => 'Pomyślnie usunięto wybranych użytkowników.',
    'activate_selected' => 'Aktywuj wybranych',
    'activate_selected_confirm' => 'Aktywować wybranych użytkowników?',
    'activate_selected_empty' => 'Nie ma wybranych użytkowników do aktywacji.',
    'activate_selected_success' => 'Pomyślnie aktywowano wybranych użytkowników.',
    'deactivate_selected' => 'Dezaktywuj wybranych',
    'deactivate_selected_confirm' => 'Dezaktywować wybranych użytkowników?',
    'deactivate_selected_empty' => 'Nie ma wybranych użytkowników do dezaktywacji.',
    'deactivate_selected_success' => 'Pomyślnie dezaktywowano wybranych użytkowników.',
    'restore_selected' => 'Przywrócić wybranych',
    'restore_selected_confirm' => 'Przywrócić wybranych użytkowników?',
    'restore_selected_empty' => 'Nie ma wybranych użytkowników do przywrócenia.',
    'restore_selected_success' => 'Pomyślnie przywrócono wybranych użytkowników.',
    'ban_selected' => 'Zbanuj wybranych',
    'ban_selected_confirm' => 'Zbanować wybranych użytkowników?',
    'ban_selected_empty' => 'Nie ma wybranych użytkowników do banowania.',
    'ban_selected_success' => 'Z powodzeniem zbanowano wybranych użytkowników.',
    'unban_selected' => 'Odbanuj wybranych',
    'unban_selected_confirm' => 'Odbanować wybranych użytkowników?',
    'unban_selected_empty' => 'Nie ma wybranych użytkowników do odbanowania.',
    'unban_selected_success' => 'Z powodzeniem odbanowano wybranych użytkowników.',
  ],
  'settings' => [
    'users' => 'Użytkownicy',
    'activation_tab' => 'Aktywacja',
    'signin_tab' => 'Zaloguj się',
    'registration_tab' => 'Rejestracja',
    'notifications_tab' => 'Powiadomienia',
    'allow_registration' => 'Zezwalaj na rejestrację użytkownika',
    'allow_registration_comment' => 'Jeśli jest to wyłączone, użytkownicy mogą być tworzeni tylko przez administratorów.',
    'activate_mode' => 'Tryb aktywacji',
    'activate_mode_comment' => 'Wybierz sposób aktywacji konta użytkownika.',
    'activate_mode_auto' => 'Automatyczny',
    'activate_mode_auto_comment' => 'Aktywowani automatycznie po rejestracji.',
    'activate_mode_user' => 'Użytkownik',
    'activate_mode_user_comment' => 'Użytkownik aktywuje własne konto za pomocą poczty e-mail.',
    'activate_mode_admin' => 'Administrator',
    'activate_mode_admin_comment' => 'Tylko administrator może aktywować użytkownika.',
    'require_activation' => 'Logowanie wymaga aktywacji konta',
    'require_activation_comment' => 'Użytkownicy muszą mieć aktywne konto, aby się zalogować.',
    'use_throttle' => 'Blokada prób logowania',
    'use_throttle_comment' => 'Powtórne nieudane próby zalogowania tymczasowo zawieszają użytkownika.',
    'block_persistence' => 'Zapobiegaj równoległym sesjom',
    'block_persistence_comment' => 'Aktywni użytkownicy nie mogą zalogować się na wielu urządzeniach w tym samym czasie.',
    'login_attribute' => 'Dane do logowania',
    'login_attribute_comment' => 'Wybierz, jakie podstawowe dane użytkownika mają być używane do logowania.',
  ],
  'user' => [
    'details' => 'Szczegóły',
  ],
  'group' => [],
  'groups' => [
    'delete_selected_confirm' => 'Czy na pewno chcesz usunąć wybrane grupy?',
    'delete_confirm' => 'Czy na pewno chcesz usunąć tę grupę?',
    'delete_selected_success' => 'Pomyślnie usunięto wybrane grupy.',
    'delete_selected_empty' => 'Brak wybranych grup do usunięcia.',
    'return_to_list' => 'Powrót do listy grup',
    'return_to_users' => 'Powrót do listy użytkowników',
    'preview_title' => 'Podejrzyj grupę użytkowników',
  ],
  'login' => [
    'attribute_email' => 'Email',
    'attribute_username' => 'Nazwa użytkownika',
  ],
  'account' => [
    'redirect_to' => 'Przekieruj do',
    'redirect_to_desc' => 'Nazwa strony do przekierowania po aktualizacji, zalogowaniu lub rejestracji.',
    'code_param' => 'Kod aktywacyjny - parametr',
    'code_param_desc' => 'Parametr URL strony używany do rejestracji',
    'force_secure' => 'Wymuś bezpieczny protokół',
    'force_secure_desc' => 'Zawsze przekierowuj adres URL ze schematem HTTPS.',
    'invalid_user' => 'Nie znaleziono użytkownika o podanych danych uwierzytelniających.',
    'invalid_activation_code' => 'Podano niepoprawny kod aktywacyjny.',
    'invalid_deactivation_pass' => 'Podane hasło jest nieprawidłowe.',
    'success_activation' => 'Pomyślnie aktywowałeś swoje konto.',
    'success_deactivation' => 'Pomyślnie dezaktywowaliśmy Twoje konto.',
    'success_saved' => 'Ustawienia zostały zapisane!',
    'login_first' => 'Musisz się najpierw zalogować!',
    'already_active' => 'Twoje konto jest już aktywowane!',
    'activation_email_sent' => 'Email aktywacyjny został wysłany na twój adres e-mail.',
    'registration_disabled' => 'Rejestracja jest obecnie wyłączona.',
    'sign_in' => 'Zaloguj się',
    'register' => 'Rejestracja',
    'full_name' => 'Imię',
    'email' => 'Email',
    'password' => 'Hasło',
    'login' => 'Login',
    'new_password' => 'Nowe hasło',
    'new_password_confirm' => 'Potwierdź nowe hasło',
  ],
  'reset_password' => [
    'reset_password_desc' => 'Formularz zapomnianego hasła.',
    'code_param' => 'Kod do resetu hasła - parametr',
    'code_param_desc' => 'Parametr URL strony używany do resetu hasła',
  ],
  'session' => [
    'session' => 'Sesja',
    'session_desc' => 'Dodaje sesję użytkownika do strony i może ograniczyć dostęp do strony.',
    'security_title' => 'Zezwól tylko',
    'security_desc' => 'Kto ma dostęp do tej strony.',
    'all' => 'Wszyscy',
    'users' => 'Użytkownicy',
    'guests' => 'Goście',
    'redirect_title' => 'Przekieruj do',
    'redirect_desc' => 'Nazwa strony do przekierowania w przypadku odmowy dostępu.',
    'logout' => 'Wylogowałeś się poprawnie!',
  ],
];
