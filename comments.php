<?php include('includes/header.php'); ?>
<div id="center">
  <div class="article_wrapper">
    <h2>Comentarios</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    <!--
        === Comentarios en HTML ===

        <p>parrafo comentado con HTML</p>
    -->

    <!-- comienzo codigo comentado con PHP -->
<?php
      // Comentarios en PHP
      //<p>parrafo comentado con PHP</p>
?>
    <!-- fin codigo comentado con PHP -->

    <script type="text/javascript">
      /*
        === Comentarios en Javascript ===

        function f1() {
          //...
        }
      */

      // -- comienzo codigo comentado con PHP --
<?php
        // Comentarios en PHP
        /*
          function f2() {
            //...
          }
        */
?>
      // -- fin codigo comentado con PHP --
    </script>
  </div>
</div>

<div id="rightcolumn">
  <?php echo info_column('Información', 'Demostración de las diferentes maneras de usar comentarios. Comparar entre el contenido de <i>comments.php</i>, lo que el navegador muestra al usuario y con el codigo fuente de la pagina al verla por medio del navegador. Más información en el capítulo 6.') ?>
</div>

<?php include('includes/footer.php'); ?>
