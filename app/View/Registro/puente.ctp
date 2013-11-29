<?php

    if(isset($error))
    {
        header("Location: /UCABsocial/Home/error");
        exit;        
    }

?>

<script type="text/javascript">
    opener.location.href = '/UCABsocial/Registro/perfil';
    window.close();
</script>