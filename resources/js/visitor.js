function fallbackCopyTextToClipboard (text) {
    const textArea = document.createElement('textarea')
    textArea.value = text

    textArea.style.top = '0'
    textArea.style.left = '0'
    textArea.style.position = 'fixed'

    document.body.appendChild(textArea)
    textArea.focus()
    textArea.select()

    try {
        document.execCommand('copy')
    } catch (err) {}

    document.body.removeChild(textArea)
}

function copyTextToClipboard (text, onDone) {
    if (!navigator.clipboard) {
        fallbackCopyTextToClipboard(text)
        if (typeof onDone === 'function') {
            onDone()
        }
        return
    }

    navigator.clipboard.writeText(text).then(function () {
        if (typeof onDone === 'function') {
            onDone()
        }
    })
}

$('.copy').tooltip()
document.querySelectorAll('.copy').forEach(selector => {
    selector.addEventListener('click', () => {
        copyTextToClipboard(selector.getAttribute('data-copy-text'), () => {
            $(selector)
                .attr('data-original-title', 'copied')
                .tooltip('show')

            setTimeout(() => {
                $(selector).attr('data-original-title', 'click to copy snippet')
            }, 2000)
        })
    })
})
