export default class ReviewForm {
    constructor() {
        this.init();
    }

    init() {

        if (document.querySelector('.comments-container .reviews')) {
            const $feedbackForm = document.querySelector('.reviews .feedback-form__form')
            if ($feedbackForm) {
                $feedbackForm.addEventListener('click', (e) => {
                    const $form = e.currentTarget
                    const $target = e.target
                    const $formSubmit = $form.querySelector('.reviews-form__button')
                    const $formAlert = $form.querySelector('.comment-form__alert')
                    let formChecked = true

                    if ($target === $formSubmit) {
                        const $feedbackFields = $form.querySelectorAll('.comment-form__field')
                        $feedbackFields.forEach(($field) => {
                            const fieldValue = $field.value
                            if (fieldValue.length === 0) {
                                $field.classList.add('error')
                                formChecked = false
                                $formAlert.textContent = 'Fill all of the fields'
                                $formAlert.classList.add('error')
                            } else {
                                $field.classList.remove('error')
                                $formAlert.classList.remove('error')
                                $formAlert.textContent = ''
                            }
                        })

                        if (formChecked) {
                            const formData = new FormData($form)
                            formData.append('action', 'ajaxreviews')
                            fetch(jsVars['ajaxurl'], {
                                method: 'POST',
                                credentials: 'same-origin',
                                body: formData,
                            })
                                // Проверка, завершилось ли выполнение запроса?
                                .then((response) => console.log(response.text()))
                                // Обработка удачного выполнения запроса
                                .then((json) => {
                                    $formAlert.classList.add('success')
                                    $formAlert.textContent = 'Your feedback has been sent for review'
                                    console.log(json)
                                    $form.reset()
                                })
                                // Обработка ошибки
                                .catch( error => console.log('error:', error) );
                        }
                    }
                })
            }
        }
    }
}
