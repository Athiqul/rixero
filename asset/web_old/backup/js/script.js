$("#NavBar").load('navigation.html')
$("#footer").load('navi.php')
setTimeout(() => {
  document.getElementById('MenuIcon').addEventListener('click', function () {
    document.querySelector(".navigationArea").classList.toggle("StylesAddedNavbar")
  })

  // When the user scrolls the page, execute myFunction
  window.onscroll = function () { myFunction() };

  // Get the navbar
  var navbar = document.getElementById("NavBar");


  // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
  function myFunction() {
    if (window.pageYOffset != 30) {
      navbar.classList.add("sticky")
    } else {
      navbar.classList.remove("sticky");
    }
  }
}, 1000);

// drag drop 

// var ViewModel = function() {
//   var self = this;
//   var filesUploaded = ko.observableArray([]);
//   function addFileToList(file) {
//     filesUploaded.push(new File(file));
//   }

//   function File(newFile) {
//     var self = this;
//     construct(newFile);

//     function construct(file) {
//       console.log(file)
//       self.name = file.name;
// 		  self.type = file.type;
// 		  self.size = Math.floor(file.size/1024) ;
//       self.icon = setIconBasedOnFileType(file.type);
//     }

//     function setIconBasedOnFileType(fileType) {
//       switch(fileType) {
//         case 'text/plain':
//           return "fa-file-text-o";
//         case 'application/pdf':
//           return "fa-file-pdf-o";
//         case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
//           return "fa-file-word-o";
//         default: 
//           return "fa-file-o";
//       }
//     }
//   }

//   return {
//     filesUploaded: filesUploaded,
//     addFileToList: addFileToList
//   };
// }

// var vm = new ViewModel();

// ko.applyBindings(vm);

// // getElementById
// function $id(id) {
//   return document.getElementById(id);
// }

// //
// // output information
// function Output(msg) {
//   var m = $id("messages");
//   m.innerHTML = msg + m.innerHTML;
// }

// // call initialization file
// if (window.File && window.FileList && window.FileReader) {
//   Init();
// }

// //
// // initialize
// function Init() {

//   var fileselect = $id("fileSelect"),
//     filedrag = $id("uploadReference");

//   var fileselect2 = $id("uploadLogoInput"),
//     filedrag2 = $id("uploadLogo");

//   // file select
//   fileselect.addEventListener("change", FileSelectHandler, false);
//   fileselect2.addEventListener("change", FileSelectHandler, false);

//   // is XHR2 available?
//   var xhr = new XMLHttpRequest();
//   if (xhr.upload) {

//     // file drop
//     filedrag.addEventListener("dragover", FileDragHover, false);
//     filedrag.addEventListener("dragleave", FileDragHover, false);
//     filedrag.addEventListener("drop", FileSelectHandler, false);

//     filedrag2.addEventListener("dragover", FileDragHover, false);
//     filedrag2.addEventListener("dragleave", FileDragHover, false);
//     filedrag2.addEventListener("drop", FileSelectHandler, false);
//     //filedrag.style.display = "block";

//     // remove submit button
//   }

// }

// // file drag hover
// function FileDragHover(e) {
//   e.stopPropagation();
//   e.preventDefault();
//   e.target.className = (e.type == "dragover" ? "uploadborder dragHover" : "uploadborder");
// }


// // file selection
// function FileSelectHandler(e) {
// 	// cancel event and hover styling
// 	FileDragHover(e);

// 	// fetch FileList object
// 	var files = e.target.files || e.dataTransfer.files;

// 	// process all File objects
// 	for (var i = 0, f; f = files[i]; i++) {
// 		//ParseFile(f);
//     vm.addFileToList(f);
// 	}

// }
let errorElement = document.querySelector(".errorShow");

document.querySelectorAll(".dropZoneInput").forEach(inputElement => {
  const dropZoneElement = inputElement.closest(".dropZone")
  dropZoneElement.addEventListener('dragover', e => {
    dropZoneElement.classList.add('dragHover')
    e.preventDefault()
  });

  ["dragleave", "dragend"].forEach(type => {
    dropZoneElement.addEventListener(type, e => {
      dropZoneElement.classList.remove('dragHover')
    })
  });
  
  dropZoneElement.addEventListener('drop', e => {
    e.preventDefault()

    if (e.dataTransfer.files.length) {
      let sumFiles = 0;
      for (let index = 0; index < e.dataTransfer.files.length; index++) {
        if (e.dataTransfer.files[index].type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
          console.log("hello")
          sumFiles++;
        }

      }
      if (sumFiles == 0) {
        inputElement.files = e.dataTransfer.files
        // console.log(e.dataTransfer.files)
        updateThumbnails(dropZoneElement, e.dataTransfer.files)
        inputElement.setAttribute("data-no", e.dataTransfer.files.length)
      }
      else {
        errorElement.innerHTML = "<p>No excel Files Allowed</p>"
        setTimeout(() => {
          errorElement.innerHTML = ""
        }, 1500);
      }
    } else {
      inputElement.setAttribute("data-no", 0)

    }
    dropZoneElement.classList.remove('dragHover')
  })


  inputElement.addEventListener('input', () => {
    // console.log('hello')
    if (inputElement.files.length) {
      let sumFiles = 0;
      for (let index = 0; index < inputElement.files.length; index++) {
        if (inputElement.files[index].type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
          console.log("hello");
          sumFiles++;
        }

      }

      if (sumFiles == 0) {
        updateThumbnails(dropZoneElement, inputElement.files)
        inputElement.setAttribute("data-no", inputElement.files.length)
      } else {
        errorElement.innerHTML = "<p>No excel Files Allowed</p>"
        // closest element for error 
        // errorElement.innerHTML = "No excel Files Allowed"
        setTimeout(() => {
          errorElement.innerHTML = ""
        }, 1500);

      }

    } else {
      inputElement.setAttribute("data-no", 0)

    }
    // console.log(inputElement)
    // console.log(this)

  })
})

function updateThumbnails(dropZone, files) {
  // console.log(dropZone);
  dropZone.firstElementChild.innerHTML = ""
  console.log(files);
  // const wholeData = [];
  let wholeData = []
  for (let index = 0; index < files.length; index++) {
    const reader = new FileReader()

    reader.readAsDataURL(files[index])
    reader.onload = () => {
      let imageRender = `<div class="showThumbnail" style="background-image:url('${reader.result}')">
                          <div class="bottomFile">
                            ${files[index].name}
                          </div>
                        </div>
                      `
      // console.log(imageRender)
      dropZone.firstElementChild.innerHTML += imageRender
    };
    // if (files[index].type.startsWith("image/")) {
    // }

  }


}

document.getElementById('firstName').addEventListener('input', e => {
  document.getElementById("dataName").value = document.getElementById('firstName').value
})
document.getElementById('personalContact').addEventListener('input', e => {
  document.getElementById("mobileNumberFinal").value = document.getElementById('personalContact').value
})
document.getElementById('mailContact').addEventListener('input', e => {
  document.getElementById("mailIdField").value = document.getElementById('mailContact').value
})
// paperSize
document.getElementById('specificDescription').addEventListener('input', e => {
  document.getElementById("specificData").innerHTML = document.getElementById('specificDescription').value
})
