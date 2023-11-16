const opt = document.getElementById('option');
let open = false;
opt.addEventListener('click', () => {
    const menu = document.getElementById('menu');
    if(open) { toggle = 'none'; open = false } else { toggle = 'block'; open = true }
    menu.style.display = toggle;
})
const conf = document.getElementById('konfir');
const del = document.getElementById('delete');
del.addEventListener('click', () => {
    conf.style.display = 'flex';
})

const tutup = () => {
    conf.style.display = 'none';
} 

//

const op = document.querySelectorAll('.options')
const menu_k = document.querySelectorAll('.menus');
const open_k = new Array(op.length)
open_k.fill(false)
op.forEach((e, i) => {
    e.addEventListener('click', () => {
        if(open_k[i]) { toggle = 'none'; open_k[i] = false } else { toggle = 'block'; open_k[i] = true }
        menu_k[i].style.display = toggle;
    })
});

const deletes = document.querySelectorAll('.deletes')
const edits = document.querySelectorAll('.edits')
const konfirs = document.querySelectorAll('.konfirs')
const tutup_konfir = document.querySelectorAll('.tutup_konfir')
const konfir_hapus = document.querySelectorAll('.konfir_hapus')

deletes.forEach((e, i) => {
    e.addEventListener('click', () => {
        konfirs[i].style.display = 'flex';
    })
    tutup_konfir[i].addEventListener('click', () => {
        konfirs[i].style.display = 'none';
    })
    konfir_hapus[i].addEventListener('click', () => {
        idhapus = konfir_hapus[i].children[0].innerText;
        window.location = './controller/deleteComment.php/?id=' + idhapus;
    })
})

edits.forEach((e, i) => {
    e.addEventListener('click', () => {
        const tulis = document.getElementById('tulis-komentar');
        tulis.value = e.children[2].innerText;
        const editb = document.getElementById('edit-button');
        document.getElementById('add-button').style.display = 'none';
        editb.style.display = 'inline-block';
        document.getElementById('can-button').style.display = 'inline-block';
        
        const id = e.children[3].innerText;

        url = "./controller/editComment.php/?id="+id;
        const form = document.getElementById('form-komen');
        form.setAttribute("action", url);
    })
})

// const can = document.getElementById('can-button');
// can.addEventListener('click', () => {
//     document.getElementById('add-button').style.display = 'block';
//     document.getElementById('edit-button').style.display = 'none';
//     document.getElementById('can-button').style.display = 'none';
//     const tulis = document.getElementById('tulis-komentar');
//     tulis.value = "";

//     const id = <?php echo $id; ?>;
//     url = "./controller/addComment.php/?id="+id;
//     const form = document.getElementById('form-komen');
//     form.setAttribute("action", url);

//     event.preventDefault();
// })

function cancel(val){
    document.getElementById('add-button').style.display = 'block';
    document.getElementById('edit-button').style.display = 'none';
    document.getElementById('can-button').style.display = 'none';
    const tulis = document.getElementById('tulis-komentar');
    tulis.value = "";

    const id = val;
    url = "./controller/addComment.php/?id="+id;
    const form = document.getElementById('form-komen');
    form.setAttribute("action", url);

    event.preventDefault();
}