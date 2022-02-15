<?php include_once('functions.php'); ?>
<section id="footer">
<div id="myOverlay" class="overlay">
	<span class="closebtn"
			onclick="closeSearch()"
			title="Close Overlay">
			X
	</span>
	<div class="overlay-content">		
		<input type="text" onblur="searchFun()" id="myInput"
				placeholder="Search.."
				name="search" />
		<button onclick="submit()">
			<i class="fa fa-search"></i>
              </button>
	</div>
	</div>
	<button class="openBtn"
			onclick="openSearch()">
		  <i id="fa" class="fa fa-search"></i>
	</button>
  <button class="openBtn">
    <a href="upload.php"><i id="fa" class="fa fa-plus" aria-hidden="true"></i>
  </button></a>
  <a href="https://htmlpreview.github.io/?https://github.com/sohamsinh31/Vplex.github.io/blob/main/music/music.html">
    <button class="openBtn">
      <i id="fa" class="fas fa-music"></i>
    </button>
  </a>
  <a href="https://htmlpreview.github.io/?https://github.com/sohamsinh31/Vplex.github.io/blob/main/vplex.html">
    <button class="openBtn">
      <i id="fa" class="fas fa-video"></i>
    </button>
  </a>
  <a href = "javascript:void(0)" onclick = "document.getElementById('lightt').style.display='block';document.getElementById('fade').style.display='block'">
  <button id="openBtn" class="openBtn">
      <?php userimmenu(); ?>
    </button>
  </a>
  </a>
  </a>
  </section>