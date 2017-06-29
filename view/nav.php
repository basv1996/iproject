<nav>
           <ul>
               <li><a href="?page=page1"><span class="glyphicon" title="Home">&#xe021;</span></a></li>
               <li><a href="?page=addition"><span class="glyphicon glyphicon-plus" title="toevoegen" ></span></a></li>
               <li><a href="?page=user"><span class="glyphicon glyphicon-user" title="User" ></span></a></li>    
               <li><a href="?page=login"><span class="glyphicon glyphicon-log-in" title="registreren"></span></a></li>           
           </ul>
           </nav>
           <?php
if ($page == 'page1' || $page == 'home'){
    echo '<input id="searchBox" type="text" name="search" placeholder="Search..">';
};
               ?>
       