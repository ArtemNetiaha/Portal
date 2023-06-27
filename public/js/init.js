function sendForm(id) {
    event.preventDefault()
    document.querySelector('#' + id).submit()
}

function subscribe(route, id, csrf) {
    event.preventDefault()
    document.querySelector('#subscribe-icon-' + id).className = 'jam jam-minus'
    document.querySelector('#subscribe-link-' + id).setAttribute('onclick', 'unsubscribe("' + route + '", "' + id + '", "' + csrf + '")')
    document.querySelector('#subscribe-link-' + id).innerHTML = 'UNSUBSCRIBE'

    fetch(route, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrf
        }
    })
}

function unsubscribe(route, id, csrf) {
    event.preventDefault()
    document.querySelector('#subscribe-icon-' + id).className = 'jam jam-plus'
    document.querySelector('#subscribe-link-' + id).setAttribute('onclick', 'subscribe("' + route + '", "' + id + '", "' + csrf + '")')
    document.querySelector('#subscribe-link-' + id).innerHTML = 'SUBSCRIBE'

    fetch(route, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrf
        }
    })
}


function deleteItem(id, modelClass) {
    document.querySelector('#model').value = modelClass
    document.querySelector('#id').value = id
    document.querySelector('#deleteItem').submit()

}
