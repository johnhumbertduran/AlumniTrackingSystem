
    var _URL = window.URL || window.webkitURL;
    var prev = document.getElementById("preview");
    var img = new Image();

    function displayPreview(files){

        var file = files[0];
        var sizeKB = file.size / 1024;
        // var uploadBtn = document.getElementById("uploadPhotoBtn");

        if(prev == ""){

        }else{

        // uploadBtn.style.display = "block";
        img.onload = function(){
            $('#preview').append(img);
        }
        img.classList.add("dp");

        img.src = _URL.createObjectURL(file);
        }
        
        // hideFunc();
        const upload_modal = document.querySelector('#upload_photo');
        const modal = bootstrap.Modal.getInstance(upload_modal);    
        modal.hide();
    }

    var closeUpload = document.getElementById("dp_close");
    

    // function closeUploadPhoto(){
    //     // prev.innerHTML = "";
    //     document.getElementById("profile_picID").value = "";
    //     img.src = "";
    //     // alert("hay");
    // }


    function hideFunc() {
        const truck_modal = document.querySelector('#staticBackdrop');
        const modal = bootstrap.Modal.getInstance(truck_modal);    
        modal.hide();
    }