<?php

return [
    /* Текст на главной странице */
    'WELCOME_TO_EETE' => 'Добро пожаловать в Extended Event Tree Editor!',
    'EETE_NAME' => 'Extended Event Tree Editor (EETE)',
    'EETE_DEFINITION' =>  '&mdash; это веб-средство предназначенное для построения расширенных диаграмм Деревьев Событий.',
    'EVENT_TREE_DEFINITION' => 'Дерево событий &mdash; алгоритм рассмотрения событий, исходящих от основного события (аварийной ситуации). ДС используется для определения и анализа последовательности (вариантов) развития аварии, включающей сложные взаимодействия между техническими системами обеспечения безопасности. При его построении используется прямая логика. В общем случае данный метод можно использовать и для анализа отказов, аварий и чрезвычайных ситуаций, где в качестве основного события рассматривается исходное состояние, т.е. состояние технического объекта в момент начала его эксплуатации.',
    'ADVANCED_EVENT_TREE_DEFINITION' => 'Нами предложено расширить существующую модель деревьев событий и визуальную нотацию их представления для получения более полной информации об исследуемых процессах развития отказов и аварий. В частности, на основании результатов системного анализа проблемы исследования динамики технического состояния механической системы выделены стадии развития обозначенных процессов (субмикроуровень, микроуровень, мезоуровень, макроуровень) и элементы их описания (механизм и кинетика). В свою очередь кинетика, рассматриваемая как последовательность событий, должна быть детализирована описанием параметров (характеристик) событий. В результате в обобщенном виде получен шаблон дерева, описывающий стадии, последовательность событий (кинетика) и механизмы их возникновения.',
    'YOU_CAN_SEE_THE_CREATED' => 'Вы можете посмотреть список созданных ранее ',
    'DIAGRAMS' => 'диаграмм',
    'WARNING_FOR_DIAGRAM_CREATION' => 'Построение диаграмм доступно только авторизованным пользователям!',
    'TO_CREATE_DIAGRAM' => 'Для создания новой диаграммы ',
    'SIGN_IN' => 'войдите в систему',
    'YOU_CAN_CREATE' => 'Вы можете создать ',
    'DIAGRAM' => 'новую диаграмму',

    /* Пункты главного меню */
    'NAV_HOME' => 'Главная',
    'NAV_ACCOUNT' => 'Учётная запись',
    'NAV_SIGNED_IN_AS' => 'Вы вошли как',
    'NAV_YOUR_PROFILE' => 'Ваш профиль',
    'NAV_HELP' => 'Помощь',
    'NAV_CONTACT_US' => 'Обратная связь',
    'NAV_SIGN_UP' => 'Регистрация',
    'NAV_SIGN_IN' => 'Вход',
    'NAV_SIGN_OUT' => 'Выход',
    'NAV_TREE_DIAGRAMS' => 'Диаграммы',

    'NAV_ADD' => 'Добавить',
    'NAV_ADD_LEVEL' => 'Уровень',
    'NAV_ADD_INITIAL_EVENT' => 'Инициирующее событие',
    'NAV_ADD_EVENT' => 'Событие',
    'NAV_ADD_MECHANISM' => 'Механизм',

    'NAV_EXPORT' => 'Экспортировать',
    'NAV_EXPORT_EETD' => 'Экспортировать EETD',

    /* Пункты правого меню */
    'SIDE_NAV_POSSIBLE_ACTIONS' => 'Возможные действия',

    /* Нижний колонтитул (подвал) */
    'FOOTER_INSTITUTE'=>'ИДСТУ СО РАН',
    'FOOTER_POWERED_BY' => 'Разработано',

    /* Общие кнопки */
    'BUTTON_OK' => 'Ok',
    'BUTTON_ADD' => 'Добавить',
    'BUTTON_SEND' => 'Отправить',
    'BUTTON_SAVE' => 'Сохранить',
    'BUTTON_SIGN_UP' => 'Зарегистрироваться',
    'BUTTON_SIGN_IN' => 'Войти',
    'BUTTON_CREATE' => 'Создать',
    'BUTTON_UPDATE' => 'Обновить',
    'BUTTON_EDIT' => 'Изменить',
    'BUTTON_DELETE' => 'Удалить',
    'BUTTON_CANCEL' => 'Отмена',
    'BUTTON_IMPORT' => 'Импортировать',
    'BUTTON_EXPORT' => 'Экспортировать',
    'BUTTON_RETURN' => 'Вернуться к',
    'BUTTON_CONNECTION' => 'Соединение',
    'BUTTON_OPEN_DIAGRAM' => 'Открыть диаграмму',

    /* Общие сообщения об ошибках */
    'ERROR_MESSAGE_PAGE_NOT_FOUND' => 'Страница не найдена.',
    'ERROR_MESSAGE_ACCESS_DENIED' => 'Вам не разрешено производить данное действие.',

    /* Общие уведомления на форме с captcha */
    'CAPTCHA_NOTICE_ONE' => 'Пожалуйста, введите буквы, показанные на картинке выше.',
    'CAPTCHA_NOTICE_TWO' => 'Буквы вводятся без учета регистра.',
    'CAPTCHA_NOTICE_THREE' => 'Для смены проверочного кода нажмите на буквы, показанные на картинке выше.',

    /* Общие заголовки сообщений */
    'WARNING' => 'Предупреждение!',
    'NOTICE_TITLE' => 'Обратите внимание',
    'NOTICE_TEXT' => 'на эту важную информацию.',

    /* Страницы сайта */
    /* Страница диаграммы */
    'TREE_DIAGRAMS_PAGE_TREE_DIAGRAM' => 'Диаграмма',
    'TREE_DIAGRAMS_PAGE_TREE_DIAGRAMS' => 'Диаграммы',
    'TREE_DIAGRAMS_PAGE_CREATE_TREE_DIAGRAM' => 'Создать диаграмму',
    'TREE_DIAGRAMS_PAGE_VIEW_TREE_DIAGRAM' => 'Просмотр диаграммы',
    'TREE_DIAGRAMS_PAGE_UPDATE_TREE_DIAGRAM' => 'Изменить диаграмму',
    'TREE_DIAGRAMS_PAGE_DELETE_TREE_DIAGRAM' => 'Удалить диаграмму',
    'TREE_DIAGRAMS_PAGE_VISUAL_DIAGRAM' => 'Визуальная диаграмма',
    'TREE_DIAGRAMS_PAGE_MODAL_FORM_TEXT' => 'Вы уверены, что хотите удалить данную диаграмму?',
    /* Сообщения на страницах администрирования событий */
    'TREE_DIAGRAMS_PAGE_MESSAGE_CREATE_TREE_DIAGRAM' => 'Вы успешно создали новую диаграмму.',
    'TREE_DIAGRAMS_PAGE_MESSAGE_UPDATED_TREE_DIAGRAM' => 'Вы успешно обновили данную диаграмму.',
    'TREE_DIAGRAMS_PAGE_MESSAGE_DELETED_TREE_DIAGRAM' => 'Вы успешно удалили диаграмму.',

    /* Страница ошибки */
    'ERROR_PAGE_TEXT_ONE' => 'Вышеупомянутая ошибка произошла при обработке веб-сервером вашего запроса.',
    'ERROR_PAGE_TEXT_TWO' => 'Пожалуйста, свяжитесь с нами, если Вы думаете, что это ошибка сервера. Спасибо.',
    /* Страница обратной связи */
    'CONTACT_US_PAGE_TITLE' => 'Обратная связь',
    'CONTACT_US_PAGE_TEXT' => 'Если у вас есть деловое предложение или другие вопросы, пожалуйста,
        заполните следующую форму, чтобы связаться с нами. Спасибо.',
    'CONTACT_US_PAGE_SUCCESS_MESSAGE' => 'Благодарим Вас за обращение к нам. Мы ответим вам как можно скорее.',
    /* Страница входа */
    'SIGN_IN_PAGE_TITLE' => 'Вход',
    'SIGN_IN_PAGE_TEXT' => 'Пожалуйста, заполните следующие поля для входа:',
    'SIGN_IN_PAGE_RESET_TEXT' => 'Если Вы забыли свой пароль, то Вы можете',
    'SIGN_IN_PAGE_RESET_LINK' => 'сбросить его',

    /* Формы */
    /* ContactForm */
    'CONTACT_FORM_NAME' => 'ФИО',
    'CONTACT_FORM_EMAIL' => 'Электронная почта',
    'CONTACT_FORM_SUBJECT' => 'Тема',
    'CONTACT_FORM_BODY' => 'Сообщение',
    'CONTACT_FORM_VERIFICATION_CODE' => 'Проверочный код',
    /* LoginForm */
    'LOGIN_FORM_USERNAME' => 'Имя пользователя',
    'LOGIN_FORM_PASSWORD' => 'Пароль',
    'LOGIN_FORM_REMEMBER_ME' => 'Запомнить меня',
    /* Сообщения LoginForm */
    'LOGIN_FORM_MESSAGE_INCORRECT_USERNAME_OR_PASSWORD' => 'Неверное имя пользователя или пароль.',
    'LOGIN_FORM_MESSAGE_BLOCKED_ACCOUNT' => 'Ваш аккаунт заблокирован.',
    'LOGIN_FORM_MESSAGE_NOT_CONFIRMED_ACCOUNT' => 'Ваш аккаунт не подтвержден.',

    /* Модели */
    /* Lang */
    'LANG_MODEL_ID' => 'ID',
    'LANG_MODEL_CREATED_AT' => 'Создан',
    'LANG_MODEL_UPDATED_AT' => 'Обновлен',
    'LANG_MODEL_URL' => 'URL',
    'LANG_MODEL_LOCAL' => 'Локаль',
    'LANG_MODEL_NAME' => 'Название',
    'LANG_MODEL_DEFAULT' => 'Язык по умолчанию',

    /* User */
    'USER_MODEL_ID' => 'ID',
    'USER_MODEL_CREATED_AT' => 'Зарегистрирован',
    'USER_MODEL_UPDATED_AT' => 'Обновлен',
    'USER_MODEL_USERNAME' => 'Логин',
    'USER_MODEL_PASSWORD' => 'Пароль',
    'USER_MODEL_AUTH_KEY' => 'Ключ аутентификации',
    'USER_MODEL_EMAIL_CONFIRM_TOKEN' => 'Метка подтверждения электронной почты',
    'USER_MODEL_PASSWORD_HASH' => 'Хэш пароля',
    'USER_MODEL_PASSWORD_RESET_TOKEN' => 'Метка сброса пароля',
    'USER_MODEL_STATUS' => 'Статус',
    'USER_MODEL_FULL_NAME' => 'Фамилия Имя Отчество',
    'USER_MODEL_EMAIL' => 'Электронная почта',
    /* Сообщения модели User */
    'USER_MODEL_MESSAGE_USERNAME' => 'Это имя пользователя уже занято.',
    'USER_MODEL_MESSAGE_UPDATED_YOUR_DETAILS' => 'Вы успешно изменили свои данные.',
    'USER_MODEL_MESSAGE_UPDATED_YOUR_PASSWORD' => 'Вы успешно изменили пароль.',

    /* TreeDiagram */
    'TREE_DIAGRAM_MODEL_ID' => 'ID',
    'TREE_DIAGRAM_MODEL_CREATED_AT' => 'Создан',
    'TREE_DIAGRAM_MODEL_UPDATED_AT' => 'Обновлен',
    'TREE_DIAGRAM_MODEL_NAME' => 'Название',
    'TREE_DIAGRAM_MODEL_DESCRIPTION' => 'Описание',
    'TREE_DIAGRAM_MODEL_TYPE' => 'Тип',
    'TREE_DIAGRAM_MODEL_STATUS' => 'Статус',
    'TREE_DIAGRAM_MODEL_AUTHOR' => 'Автор',
    /* Значения полей типов диаграмм*/
    'TREE_DIAGRAM_MODEL_EVENT_TREE_TYPE' => 'Дерево событий',
    'TREE_DIAGRAM_MODEL_FAULT_TREE_TYPE' => 'Дерево отказов',
    /* Значения полей статусов*/
    'TREE_DIAGRAM_MODEL_PUBLIC_STATUS' => 'Публичный',
    'TREE_DIAGRAM_MODEL_PRIVATE_STATUS' => 'Частный',

    /* Node */
    'NODE_MODEL_ID' => 'ID',
    'NODE_MODEL_CREATED_AT' => 'Создан',
    'NODE_MODEL_UPDATED_AT' => 'Обновлен',
    'NODE_MODEL_NAME' => 'Название',
    'NODE_MODEL_DESCRIPTION' => 'Описание',
    'NODE_MODEL_OPERATOR' => 'Оператор',
    'NODE_MODEL_TYPE' => 'Тип',
    'NODE_MODEL_PARENT_NODE' => 'Родительский узел',
    'NODE_MODEL_TREE_DIAGRAM' => 'Диаграмма',
    'NODE_MODEL_LEVEL_ID' => 'Название уровня',
    /* Значения операторов */
    'NODE_MODEL_NOT_OPERATOR' => 'Отрицание',
    'NODE_MODEL_AND_OPERATOR' => 'И',
    'NODE_MODEL_OR_OPERATOR' => 'Или',
    'NODE_MODEL_XOR_OPERATOR' => 'Сложение по модулю 2',
    /* Значения типов узлов */
    'TREE_DIAGRAM_MODEL_INITIAL_EVENT_TYPE' => 'Инициирующее событие',
    'TREE_DIAGRAM_MODEL_EVENT_TYPE' => 'Событие',
    'TREE_DIAGRAM_MODEL_MECHANISM_TYPE' => 'Механизм',

    /* Parameter */
    'PARAMETER_MODEL_ID' => 'ID',
    'PARAMETER_MODEL_CREATED_AT' => 'Создан',
    'PARAMETER_MODEL_UPDATED_AT' => 'Обновлен',
    'PARAMETER_MODEL_NAME' => 'Название',
    'PARAMETER_MODEL_DESCRIPTION' => 'Описание',
    'PARAMETER_MODEL_OPERATOR' => 'Оператор',
    'PARAMETER_MODEL_VALUE' => 'Значение',
    'PARAMETER_MODEL_NODE' => 'Узел',
    /* Значения операторов */
    'PARAMETER_MODEL_EQUALLY_OPERATOR' => '=',
    'PARAMETER_MODEL_MORE_OPERATOR' => '>',
    'PARAMETER_MODEL_LESS_OPERATOR' => '<',
    'PARAMETER_MODEL_MORE_EQUAL_OPERATOR' => '>=',
    'PARAMETER_MODEL_LESS_EQUAL_OPERATOR' => '<=',
    'PARAMETER_MODEL_NOT_EQUAL_OPERATOR' => '≠',
    'PARAMETER_MODEL_APPROXIMATELY_EQUAL_OPERATOR' => '≈',

    /* Level */
    'LEVEL_MODEL_ID' => 'ID',
    'LEVEL_MODEL_CREATED_AT' => 'Создан',
    'LEVEL_MODEL_UPDATED_AT' => 'Обновлен',
    'LEVEL_MODEL_NAME' => 'Название',
    'LEVEL_MODEL_DESCRIPTION' => 'Описание',
    'LEVEL_MODEL_PARENT_LEVEL' => 'Родительский уровень',
    'LEVEL_MODEL_TREE_DIAGRAM' => 'Диаграмма',

    /* Sequence */
    'SEQUENCE_MODEL_ID' => 'ID',
    'SEQUENCE_MODEL_CREATED_AT' => 'Создан',
    'SEQUENCE_MODEL_UPDATED_AT' => 'Обновлен',
    'SEQUENCE_MODEL_TREE_DIAGRAM' => 'Диаграмма',
    'SEQUENCE_MODEL_LEVEL' => 'Уровень',
    'SEQUENCE_MODEL_NODE' => 'Узел',
    'SEQUENCE_MODEL_PRIORITY' => 'Приоритет',

    /* Заголовки модальных форм */
    'LEVEL_ADD_NEW_LEVEL' => 'Добавить новый уровень',
    'LEVEL_EDIT_LEVEL' => 'Изменение уровня',
    'LEVEL_DELETE_LEVEL' => 'Удаление уровня',
    'EVENT_ADD_NEW_EVENT' => 'Добавить новое событие',
    'EVENT_EDIT_EVENT' => 'Изменение события',
    'EVENT_DELETE_EVENT' => 'Удаление события',
    'PARAMETER_ADD_NEW_PARAMETER' => 'Добавить новый параметр',
    'PARAMETER_EDIT_PARAMETER' => 'Изменение параметра',
    'PARAMETER_DELETE_PARAMETER' => 'Удаление параметра',
    'MECHANISM_ADD_NEW_MECHANISM' => 'Добавить новый механизм',
    'MECHANISM_EDIT_MECHANISM' => 'Изменение механизма',
    'MECHANISM_DELETE_MECHANISM' => 'Удаление механизма',
    'ERROR_LINKING_ITEMS' => 'Ошибка при связывании элементов',
    'DELETE_RELATIONSHIP' => 'Удаление связи',

    /* Cообщения */
    'MAXIMUM_CONNECTIONS' => 'Максимальное количество соединений ',
    'MECHANISMS_SHOULD_NOT_BE_INTERCONNECTED' => 'Механизмы не должны быть связаны между собой',
    'ELEMENTS_NOT_BE_ASSOCIATED_WITH_OTHER_ELEMENTS_HIGHER_LEVEL' => 'Элементы не должны быть связаны с другими элементами на вышестоящем уровне',
    'LEVEL_MUST_BEGIN_WITH_MECHANISM' => 'Уровень должен начинаться с механизма',
    'INITIAL_EVENT_SHOULD_NOT_BE_INCOMING_CONNECTIONS' => 'У начального события не должно быть входящих соединений',

    'ALERT_CHANGE_LEVEL' => 'При изменении уровня, связи будут удалены!',
    'ALERT_INITIAL_LEVEL' => 'Удаляется начальный уровень, поэтому будут удалены механизмы на следующем уровне!',
    'ALERT_DELETE_LEVEL' => 'При удалении будут удалены все элементы на уровне!',

    'RELATIONSHIP_PAGE_DELETE_CONNECTION_TEXT' => 'Вы действительно хотите удалить связь?',
    'DELETE_LEVEL_TEXT' => 'Вы действительно хотите удалить уровень?',
    'DELETE_EVENT_TEXT' => 'Вы действительно хотите удалить событие?',
    'DELETE_MECHANISM_TEXT' => 'Вы действительно хотите удалить механизм?',
    'DELETE_PARAMETER_TEXT' => 'Вы действительно хотите удалить параметр?',

    'CONNECTION_DELETE' => 'Удалить',
];