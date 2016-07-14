
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
    <script src="/assets/js/toastr/toastr.min.js"></script>
    <script src="/assets/js/custom.js"></script>
    <?php if(isset($_GET['msg'])): ?>
    <script type="text/javascript">

      <?php if($_GET['msg'] == 's'): ?>
        toastr.success('Ação realizada com sucesso!');
      <?php else: ?>
        toastr.danger('Falha ao realizar a ação!');
      <?php endif; ?>
    </script>
    <?php endif; ?>
  </body>
</html>
