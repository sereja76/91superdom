<?
echo validation_errors();
echo form_open('lk/mail_to_adm');

?>
<p>Если у вас возникли какие либо вопросы, предложения или пожелания, заполните форму ниже и получив письмо направим ответ по указанному email</p>
Email куда направить ответ на вопрос:<br/>
<input type="text" size="40" name="email" value="<?=$this->session->userdata('email')?>"><br/>
Ваше сообщение:<br/>
<textarea  name="message" cols="50" rows="6"></textarea></br>

<?
echo form_submit('mysubmit', 'Отправить');
echo form_close();
?>