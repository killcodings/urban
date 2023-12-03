export default class Feedback {
    constructor() {
        this.init();
    }

    init() {
        const $feedbackForm = document.querySelector('.comment-form__form')
        if ($feedbackForm) {
            $feedbackForm.addEventListener('click', (e) => {
                const $form = e.currentTarget
                const $target = e.target
                const $formSubmit = $form.querySelector('.feedback-form__button')
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
                        formData.append('action', 'ajaxfeedbacks')
                        let xhr = new XMLHttpRequest()
                        xhr.open('POST', jsVars.ajaxurl, true)
                        xhr.send(formData)
                        $formAlert.classList.add('success')
                        $formAlert.textContent = 'Your feedback has been sent for review'
                        $form.reset()
                    }
                }
            })
        }
    }
}
