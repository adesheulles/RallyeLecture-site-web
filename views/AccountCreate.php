<?php echo validation_errors(); ?>
<?php echo form_open_multipart('Account/Create'); ?>
<div>Nom      : <input type="text" name="nom" value="<?php echo $this->input->post('nom'); ?>" /></div>
<div>Prenom      : <input type="text" name="prenom" value="<?php echo $this->input->post('prenom'); ?>" /></div>
<div>Votre Email      : <input type="text" name="login" value="<?php echo $this->input->post('login'); ?>" /></div>
<div>Mot de passe      : <input type="text" name="password" value="<?php echo $this->input->post('password'); ?>" /></div>
<div>Comfirmez le mot de passe      : <input type="text" name="confirmer" value="<?php echo $this->input->post('confirmer'); ?>" /></div>
<button type="submit">Créez votre compte</button>
<?php echo form_close(); ?>