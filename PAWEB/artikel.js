const konten = document.querySelectorAll(".news-card");

konten.forEach(e => {
    e.addEventListener('click', () => {
        const id = e.children[0].innerText;
        window.location.href = "./read.php?id="+id;
    })
});

var isopen = false;
function openedit() {
    const edit = document.getElementById('editprofil');
    isopen = !isopen;
    if(isopen) edit.style.display = 'flex';
    else edit.style.display = 'none';
}

const x = document.getElementById('close-edit');
x.addEventListener('click', openedit);

function deleteprofile(val){
    let v = confirm('Yakin hapus akun?')
    if(v){
        window.location = "./controller/deleteprofil.php?id="+val;
    }
}