function togglePopup(){
    document.getElementById("popup-1").classList.toggle("active");
  }
    document.getElementById("s1").onclick= function() {myFunction()};
  
  function myFunction() {
    document.getElementById("s2");
    s2.parentNode.removeChild(s2);
  }
  
  document.getElementById("s3").onclick= function() {myFunction2()};
  
  function myFunction2() {
    document.getElementById("s4");
    s4.parentNode.removeChild(s4);
  }
    document.getElementById("openBtn").onclick= function() {myFunction2()};
  function myFunction2() {
    document.getElementById('more').style.display='block';document.getElementById('fade').style.display='block';
  };
   document.getElementById("q1").onclick= function() {window.location='https://htmlpreview.github.io/?https://github.com/sohamsinh31/Vplex.github.io/blob/main/ifrmes/swm1.html'};
   document.getElementById("q2").onclick= function() {window.location='https://htmlpreview.github.io/?https://github.com/sohamsinh31/Vplex.github.io/blob/main/ifrmes/sfl1.html'};

    // Open the full screen search box
  function openSearch() {
  document.getElementById("myOverlay").style.display = "block";
  }
  
  // Close the full screen search box
  function closeSearch() {
  document.getElementById("myOverlay").style.display = "none";
  }
    
         const searchFun = () =>{
             let filter = document.getElementById('myInput').value;
         }
         function submit() {
             let filter = document.getElementById('myInput').value;  
             let div = document.getElementsByTagName('div');
       
             for(var w=0; w<div.length; w++){
                 let td = div[w].getElementsByTagName('p3')[0];
                 if(td){
                     let textvalue = td.textContent || td.innerHTML;
       
                     if(textvalue.indexOf(filter) > -1){
                         div[w].style.display = "";
                     }else{
                       div[w].style.display = "none";
                     }
                 }
             }
             
         }

         function moreop() {
           let light = document.getElementById("light")
           for(var z=o; z<light.n; z++);
         }
         document.addEventListener("contextmenu",function(minitv) {
           minitv.preventDefault();
         });
         function clickme(){
          // alert("Submit button clicked!");
          return true;
          }
          function foo() {
            //  alert("Submit button clicked!");
             return true;
          }
          function foo2() {
            // alert("Submit button clicked!");
            return true;
         }
         function uploads() {
            window.location='uservideos.php';
         }
	$(document).ready(function(){
		// when the user clicks on like
		$('.like').on('click', function(){
			var postid = $(this).data('id');
			    $post = $(this);

			$.ajax({
				url: 'watch.php',
				type: 'post',
				data: {
					'liked': 1,
					'postid': postid
				},
				success: function(response){
					$post.parent().find('span.likes_count').text(response + " likes");
					$post.addClass('hide');
					$post.siblings().removeClass('hide');
				}
			});
		});

		// when the user clicks on unlike
		$('.unlike').on('click', function(){
			var postid = $(this).data('id');
		    $post = $(this);

			$.ajax({
				url: 'watch.php',
				type: 'post',
				data: {
					'unliked': 1,
					'postid': postid
				},
				success: function(response){
					$post.parent().find('span.likes_count').text(response + " likes");
					$post.addClass('hide');
					$post.siblings().removeClass('hide');
				}
			});
		});
	});         