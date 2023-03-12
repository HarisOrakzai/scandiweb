// const map = {
//   "dvd": "dvd",
//   "furniture": "furniture",
//   "book": "book"
// };

// document.querySelectorAll(".dropbox")
// .forEach((node) => (node.style.display = "none"));
// document.getElementById(map[value]).style.display = "flex";

function dropdownlist(value){
    var dvd = document.getElementById("dvd");
    var furniture = document.getElementById("furniture");
    var book = document.getElementById("book");
    
    dvd.style.display="none";
    furniture.style.display="none";
    book.style.display="none";
    
    if(value=="dvd"){
        dvd.style.display="flex";
    }

    else if(value=="furniture"){
        furniture.style.display="flex";
    }

    else if(value=="book"){
        book.style.display="flex";
    }
}


$('select').on('change',function(){
    if($(this).val() == 'dvd'){
        $("#size").prop('required',true);
    }
    else{
        $("#size").prop('required',false);
    }

    if($(this).val() == 'furniture'){
        $("#height").prop('required',true);
        $("#length").prop('required',true);
        $("#width").prop('required',true);
    }
    else{
        $("#height").prop('required',false);
        $("#length").prop('required',false);
        $("#width").prop('required',false);
    }

    if($(this).val() == 'book'){
        $("#weight").prop('required',true);
    }
    else{
        $("#weight").prop('required',false);
    }
});