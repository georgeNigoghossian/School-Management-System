@include('teacher.partials.head')
@include('teacher.partials.header')

<section>
    <form method="post" action="{{ route('exam.store') }}">
        @csrf
    <div id="kamel" class="container h-custom">
      <div class="row d-flex justify-content-center  h-100">
        <div class="add-exam col-md-3 col-lg-4 col-xl-4  d-flex align-items-center" >
          <img src="{{ asset('assets/img/questions.svg') }}" class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-9 col-lg-8 col-xl-7  d-block m-auto text-center">
          <h2 class="mb-3 text-primary fw-bold text-uppercase ">Add Exam Questions </h2>
        <div class="d-flex justify-content-evenly align-items-center">
          <div class="mt-2 ">
            <label class="label-question form-label text-dark fs-5 fw-bold " for="form6Example1">Exam Name: </label>
            <input  name="name" type="text" id="" class="form-control  " placeholder="Exam Name:" style="box-shadow: 0 0 10px 0 #62bed5 ,0 0 10px 0 #e0bfe0;" required/>
            
            <label class="label-question form-label text-dark fs-5 fw-bold mt-2" for="form6Example1">Number Of Questions: </label>
            <input  name="number_of_questions" type="number" id="mynumber" class="form-control  " placeholder="Number Of Questions:" style="box-shadow: 0 0 10px 0 #62bed5 ,0 0 10px 0 #e0bfe0;" required/>
            <label class="label-question form-label text-dark fs-5 fw-bold mt-2" for="form6Example1" >Exam Date: </label>
            <input  name="exam_date" type="date" id="" class="form-control  " placeholder="Exam Date:" style="box-shadow: 0 0 10px 0 #62bed5 ,0 0 10px 0 #e0bfe0;" required/>
            <label class="label-question form-label text-dark fs-5 fw-bold mt-2" for="form6Example1" >Exam Duration: </label>
            <input  name="exam_duration" type="number" id="" class="form-control  " placeholder="Exam Duration:" style="box-shadow: 0 0 10px 0 #62bed5 ,0 0 10px 0 #e0bfe0;" required/>
        </div>
        <div class="mt-2 ">
  
          <label class="label-question form-label text-dark fs-5 fw-bold" for="form6Example1">Course Name: </label>
          <select placeholder="Choose Course" name="course_id" class="form-select" aria-label="Default select example" id="form6Example2" style="box-shadow: 0 0 10px 0 #62bed5 ,0 0 10px 0 #e0bfe0;" required>
        
            @foreach ($courses as $course)
            <option value="{{ $course->id }}" class="py-2" >{{ $course->name }}</option>
            @endforeach
            
          </select>
          <label class="label-question form-label text-dark fs-5 fw-bold mt-2" for="form6Example1">Total Mark: </label>
          <input  name="total_mark" type="number" id="totalMark" class="form-control  " placeholder="Total Mark:" style="box-shadow: 0 0 10px 0 #62bed5 ,0 0 10px 0 #e0bfe0;" required/>
          <label class="label-question form-label text-dark fs-5 fw-bold mt-2" for="form6Example1" >Exam Time: </label>
          <input  name="exam_time" type="time" id="" class="form-control  " placeholder="Exam Time:" style="box-shadow: 0 0 10px 0 #62bed5 ,0 0 10px 0 #e0bfe0;" required/>
          
          <label class="label-question form-label text-dark fs-5 fw-bold mt-2" for="form6Example1" >Type Of Questions: </label>
          <select name="exam_type" class="form-select d-block m-auto" aria-label="Default select example" id="typeQuestion" style="box-shadow: 0 0 10px 0 #62bed5 ,0 0 10px 0 #e0bfe0;" required>
            <option value="1" selected >Automation</option>
            <option value="2" >Traditional</option>
          </select>
      </div>
     
        </div>
        <!-- <label class="label-question form-label text-dark fs-5 fw-bold mt-2" for="form6Example1" >Exam Date: </label>
        <input  type="date" id="" class="form-control w-50 d-block m-auto " placeholder="Exam Date:" style="box-shadow: 0 0 10px 0 #62bed5 ,0 0 10px 0 #e0bfe0;" required/> -->
        <button class="btn  mt-4  px-5 text-white"  id="btn-add"  style="letter-spacing: 1.5px;background-color:#587187;" onclick="add();">ADD <i class="fa-solid fa-circle-plus ms-1"></i></button>
      
        <!-- <button onclick="myFunction()" type="button" class="btn btn-dark mb-4" style="font-size: 16px;">Add More<i class="fa-solid fa-circle-plus ms-2"></i></button> -->
    
        </div>
      </div>
     
        <div class="accordion w-75 d-block m-auto mt-5" id="accordionExample">
         
  
          </div>
      </div>
    </form>
  </section>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script>
     
    
        
           function add(){
       
           var select = document.getElementById('typeQuestion');
           var value = select.options[select.selectedIndex].value;
         
           if(value == 1){
           
               var num = document.getElementById("mynumber").value;
               for (let i = 1; i <= num ; i++) {
                
               html= `<div class="accordion-item mb-3 border-top">\
                 <h2 class="accordion-header" id="heading`+i+`">\ 
                     <button class="accordion-button collapsed  fw-bold " type="button" data-bs-toggle="collapse" data-bs-target="#collapse`+i+`" aria-expanded="false" aria-controls="collapse`+i+`" style="color:#587187;">\
                     <i class="fa-solid fa-plus-circle me-2"></i>\
                         Questions `+i+`
                     </button>\
                 </h2>\
                 <div id="collapse`+i+`" class="accordion-collapse collapse " aria-labelledby="heading`+i+`" data-bs-parent="#accordionExample">\
                     <div class="accordion-body">\
                         <input name="questions[]" class="form-control  fw-bold text-dark border-4 " type="text" placeholder="Question Text ?" aria-label="default input example">\
                         <div class="d-flex justify-content-center align-items-center">\
                           <span class="border  text-white rounded-circle px-2 me-1" style="background-color:#587187;">A</span>\
                         <input name="answers1[]"class="form-control" type="text" placeholder="Choice 1:" aria-label="default input example">\
                       </div>\
                       <div class="d-flex justify-content-center align-items-center">\
                         <span class="border  text-white rounded-circle px-2 me-1" style="background-color:#587187;">B</span>\
                         <input name="answers2[]" class="form-control" type="text" placeholder="Choice 2:" aria-label="default input example">\
                     </div>\
                     <div class="d-flex justify-content-center align-items-center">\
                       <span class="border  text-white rounded-circle px-2 me-1" style="background-color:#587187;">C</span>\
                       <input name="answers3[]" class="form-control" type="text" placeholder="Choice 3:" aria-label="default input example">\
                     </div>\
                   <div class="d-flex justify-content-center align-items-center">\
                     <span class="border  text-white rounded-circle px-2 me-1" style="background-color:#587187;">D</span>\
                     <input name="answers4[]" class="form-control" type="text" placeholder="Choice 4:" aria-label="default input example">\
                   </div>\
                   <div class="d-flex justify-content-center align-items-center">\
                     <span class="border  text-white rounded px-2 me-1" style="background-color:#587187;"> Answer:</span>\
                     <select name="correct_answers[]" class="form-select" aria-label="Default select example" id="form6Example2">\
                       <option value="A" class="py-2">A</option>\
                       <option value="B">B</option>\
                       <option value="C">C</option>\
                       <option value="D">D</option>\
                   </select>\
                   <span class="border  text-white rounded px-2 mx-1" style="background-color:#587187;"> Mark:</span>\
                   <input  name="marks[]" type="number" id="mark`+i+`" onchange="sumMark(this)" class="form-control  m-auto" placeholder="Mark Of Question:" />\
                   </div>\
                     </div>
                 </div>
             </div> `
               var accordion = document.querySelector(".accordion")
               accordion.insertAdjacentHTML('beforeend',html);
       
       
               } 
               //document.getElementById("mynumber").setAttribute('disabled','');
               document.getElementById("btn-add").setAttribute('disabled','');
               //select.setAttribute('disabled','');
             
               html2 =`
               <div class="d-flex justify-content-center">\
               <button class="btn  mt-3 px-5 text-white" id="btn-submit" onclick="check()" type="submit" style="letter-spacing: 1.5px;background-color:#587187;">Submit </button>\
               </div>`
               var kamel = document.getElementById("kamel");
               kamel.insertAdjacentHTML('beforeend',html2);
             }
       
       
             if(value == 2){
           
           var num = document.getElementById("mynumber").value;
           for (let i = 1; i <= num ; i++) {
            
           html= `<div class="accordion-item mb-3 border-top">\
             <h2 class="accordion-header" id="heading`+i+`">\ 
                 <button class="accordion-button collapsed  fw-bold " type="button" data-bs-toggle="collapse" data-bs-target="#collapse`+i+`" aria-expanded="false" aria-controls="collapse`+i+`" style="color:#587187;">\
                 <i class="fa-solid fa-plus-circle me-2"></i>\
                     Questions `+i+`
                 </button>\
             </h2>\
             <div id="collapse`+i+`" class="accordion-collapse collapse " aria-labelledby="heading`+i+`" data-bs-parent="#accordionExample">\
                 <div class="accordion-body">\
                     <input name="questions[]" class="form-control  fw-bold text-dark border-4 " type="text" placeholder="Question Text ?" aria-label="default input example">\
              
               <div class="d-flex justify-content-center align-items-center mt-2">\
               <span class="border  text-white rounded px-2 mx-1" style="background-color:#587187;"> Mark:</span>\
               <input  name="marks[]" type="number" id="mark`+i+`" onchange="sumMark(this)" class="form-control w-50 " placeholder="Mark Of Question:" />\
               </div>\
                 </div>
             </div>
         </div> `
           var accordion = document.querySelector(".accordion")
           accordion.insertAdjacentHTML('beforeend',html);
           } 
           //document.getElementById("mynumber").setAttribute('disabled','');
           document.getElementById("btn-add").setAttribute('disabled','');
           //select.setAttribute('disabled','');
         
           html2 =`
               <div class="d-flex justify-content-center">\
               <button class="btn  mt-3 px-5 text-white" id="btn-submit" onclick="check()"   type="submit" style="letter-spacing: 1.5px;background-color:#587187;">Submit </button>\
               </div>`
           var kamel = document.getElementById("kamel");
           kamel.insertAdjacentHTML('beforeend',html2);
         }
       
       
         // var totalMark = document.getElementById("totalMark").value;
         //     console.log(totalMark);
       
       
         }
       
       //   function ff() {
       //   const result= document.getElementById("totalMark").value;
       //   return result;
       // }

         function sumMark(dd){
          var totalMark=$('#totalMark').val();
           var mark = dd.value;
       
               // console.log(totalMark);
               totalMark = totalMark - mark;
               // console.log(totalMark);
              
               if(totalMark < 0){
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Check Your Mark Questions',
                
                })
                 zero();
                 totalMark=$('#totalMark').val();
               }
         }

        //  function check(){
        //   var totalMark=$('#totalMark').val();
        //   var num = document.getElementById("mynumber").value;
        //    var sum=0;
        //    for (let i = 1; i <= num ; i++) {
        //      var mark = document.getElementById("mark"+i);
        //      sum+=mark;
        //    }

        //    if(sum!=totalMark){
        //     //alert("No");
        //     Swal.fire({
        //     icon: 'error',
        //     title: 'Oops...',
        //     text: 'Sum of all marks is not correct',
            
           
        //   });

          
        //   }
          
        //    //alert("YES");
       
        //  }
       
         function zero(){
          
           var num = document.getElementById("mynumber").value;
           
           for (let i = 1; i <= num ; i++) {
             var mark = document.getElementById("mark"+i);
             mark.value = 0;
           }
         }
       
            
       </script>
       
@include('teacher.partials.footer')
