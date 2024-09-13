let editForm = document.querySelector('#editForm');

editForm.addEventListener('submit', async function (e) {
    e.preventDefault();

    let id = document.querySelector('#edit_id').value;
    let name = document.querySelector('#nameEdit').value;
    let email = document.querySelector('#emailEdit').value;

    let obj = { id, name, email };

    let res = await fetch('./apis/update.php', {
        method: 'POST',
        body: JSON.stringify(obj)
    });

    res = await res.json();

    if (res.result == 'success') {
        show();
    }
});