<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link <?php if(isset($index)) echo "collapsed" ?>" href="index.php">
      <i class="bi bi-grid"></i>
      <span>Statistiques  </span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if(isset($gestion)) echo "collapsed" ?>" href="cours.php">
      <i class="bi bi-grid"></i>
      <span>Gestion des Cours</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if(isset($question)) echo "collapsed" ?>" href="QuesRepo.php">
      <i class="bi bi-grid"></i>
      <span>Questions & Réponses </span>
    </a>
  </li>
  <li class="nav-item ">
    <a class="nav-link <?php if(isset($user)) echo "collapsed" ?>" href="utlisateurs.php">
      <i class="bi bi-grid"></i>
      <span>Gestion des Utilisateurs </span>
    </a>
  </li>
</ul>

</aside>
