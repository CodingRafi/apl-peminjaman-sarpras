$(".menu-hamburger").on("click", function(){
    $(".menu-hamburger").toggleClass("active");
})

const dropd = document.querySelectorAll(".container6 ul .linkUnik");
const dropdowna = document.querySelectorAll(".dropDown-a");
// hapus div active
function hapusactivediv(){
    dropd.forEach((e, i) => {
        if(i === 0){
            e.classList.remove("nyala");
            return true;
        }else{
            let el = e.children;
            el = el[1];
            el.classList.remove("aktifkan");
            e.classList.remove("nyala");
        }
    })
}

// hapus panah active
function hapuspanah(){
    dropdowna.forEach((e,i) => {
        if(i === 0){
            return true;
        }else{
            let d = e.children
            d = d[2];
            d.classList.remove('dropaktif');   
        }
    })
}

let cadangkan;
dropd.forEach((el,i) => {
    if(el.classList.contains("nyala") == true){
        cadangkan = el;
    }
    el.addEventListener("click", function(){
        hapusactivediv();
        hapuspanah();
        cadangkan.classList.add("nyala");
        el.classList.add("nyala");

        el.children[1].classList.add("aktifkan");
        el.children[0].children[2].classList.add("dropaktif");
    })
})

$(".menu-hamburger").on("click", function(){
    $(".container3").toggleClass("navaktif");
    $(".container2").toggleClass("sidebarBuka")
})

const settings = document.querySelector(".settings");
const perintah = document.querySelector(".perintah");
const tableBarangAction = document.querySelectorAll(".tableBarangAction");
const editBarang = document.querySelectorAll(".editBarang");
const hapusBarang = document.querySelectorAll(".hapusBarang");
const tableInven = document.querySelectorAll(".tableInven");
const hapus2 = document.querySelectorAll(".hapus2");

$(".container4").on("click", function(){
    hapusactivediv();
    hapuspanah();
    cadangkan.classList.add("nyala");
})

function setting(){
    perintah.classList.toggle("setaktip");
}

function editBarang1(confirm){
    if(confirm === true){
        tableBarangAction.forEach(el => {
            el.classList.add("tip");
        })
        editBarang.forEach(e => {
            e.classList.add("tip")
        })
        
        $(".edit1").addClass("aktip");
        perintah.classList.add("setaktip");
        
        $(".tombolAk").addClass("nyal");

        $(".edit1").attr("onclick", "editBarang1()");
    }else{
        tableBarangAction.forEach(el => {
            el.classList.remove("tip");
        })
        editBarang.forEach(e => {
            e.classList.remove("tip")
        })
        
        $(".edit1").removeClass("aktip");
        perintah.classList.remove("setaktip");
        
        $(".tombolAk").removeClass("nyal");

        $(".edit1").attr("onclick", "editBarang1(confirm('Apakah anda yakin ingin mengaktifkan fitur edit?'))");
    }
}

function hapusbarang1(confirm){
    if(confirm === true){
        tableBarangAction.forEach(el => {
            el.classList.add("tip2");
        })
    
        hapusBarang.forEach(e => {
            e.classList.add("tip")
        })
        
        $(".hapus1").addClass("aktip");
        perintah.classList.add("setaktip");
        
        $(".tombolAkDel").addClass("nyal");

        $(".hapus1").attr("onclick", "hapusbarang1()");
    }else{
        tableBarangAction.forEach(el => {
            el.classList.remove("tip2");
        })
    
        hapusBarang.forEach(e => {
            e.classList.remove("tip")
        })
        
        $(".hapus1").removeClass("aktip");
        perintah.classList.remove("setaktip");
        
        $(".tombolAkDel").removeClass("nyal");

        $(".hapus1").attr("onclick", "hapusbarang1(confirm('Apakah anda yakin ingin mengaktifkan fitur delete?'))");
    }
}

function hapusInven(confirm){
    if(confirm === true){
        tableInven.forEach(el => {
            el.classList.toggle("tip2");
        })
    
        hapus2.forEach(e => {
            e.classList.toggle("tip")
        })
        
        $(".hapus3").addClass("aktip");
        perintah.classList.add("setaktip");
        
        $(".tombolAkDel2").addClass("nyal");

        $(".hapus3").attr("onclick", "hapusInven()");
    }else{
        tableInven.forEach(el => {
            el.classList.remove("tip2");
        })
    
        hapus2.forEach(e => {
            e.classList.remove("tip")
        })
        
        $(".hapus3").removeClass("aktip");
        perintah.classList.remove("setaktip");
        
        $(".tombolAkDel2").removeClass("nyal");

        $(".hapus3").attr("onclick", "hapusInven(confirm('Apakah anda yakin ingin mengaktifkan fitur delete?'))");
    }
}


