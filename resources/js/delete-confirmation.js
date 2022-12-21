function deleteConfirmation(ev) {
    const confirmed = confirm('Tem certeza que deseja excluir este registro?')
    if (!confirmed) ev.preventDefault()
}

window.addEventListener('DOMContentLoaded', () => {
    const $elementesToConfirm = document.querySelectorAll('.delete-confirmation')

    if ($elementesToConfirm.length > 0) {
        $elementesToConfirm.forEach(($el) => {
            $el.addEventListener('submit', deleteConfirmation)
        })
    }
})
