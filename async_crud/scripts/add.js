let form = document.querySelector('form');

form.addEventListener('submit', async function (e) {
    e.preventDefault();

    let name = document.querySelector('#name');
    let email = document.querySelector('#email');


    let obj = { name: name.value, email: email.value };

    let res = await fetch('./apis/add.php', {
        method: 'POST',
        body: JSON.stringify(obj)
    });

    res = await res.json();

    if (res.result == 'success') {
        alert(res.response);
    }
});