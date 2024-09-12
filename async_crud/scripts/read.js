let tableBody = document.querySelector('tbody');

show();
async function show() {
    tableBody.innerHTML = '';
    let res = await fetch('./apis/read.php');

    res = await res.json();

    res = res.response;

    for (let i = 0; i < res.length; i++) {
        let tr = document.createElement('tr');

        for (let key in res[i]) {
            let td = document.createElement('td');
            td.innerText = res[i][key];
            tr.append(td);
        }
        let edit_td = document.createElement('td');
        let edit_btn = document.createElement('button');
        edit_btn.innerText = 'edit';
        edit_btn.classList.add('btn');
        edit_btn.classList.add('btn-primary');
        edit_td.append(edit_btn);

        let delete_td = document.createElement('td');
        let delete_btn = document.createElement('button');
        delete_btn.innerText = 'delete';
        delete_btn.classList.add('btn');
        delete_btn.classList.add('btn-danger');
        delete_btn.setAttribute('data-bs-toggle', 'modal');
        delete_btn.setAttribute('data-bs-target', '#exampleModal');
        delete_btn.setAttribute('onclick', 'deleteData(this)');
        delete_td.append(delete_btn);

        tr.append(edit_td, delete_td);

        tableBody.append(tr);
    }
}

function deleteData(element) {
    let id = element.parentElement.parentElement.children[0].innerText;

    document.querySelector('.dlt_modal_btn').setAttribute('id', id);
}

async function actualDelete(elemt) {

    let res = await fetch('./apis/delete.php', {
        method: 'POST',
        body: elemt.id
    });

    res = await res.json();

    if (res.result == 'success') {
        show();
    }
}

// function createNewElement(element, innertext, classs) {
//     let elements = document.createElement(element);
//     elements.innerHTML = innertext;

//     return elements;
// }