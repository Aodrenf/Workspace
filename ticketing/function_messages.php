<?php

function message($ticket_id)
{
    if (isset($_POST['message']))
{
    $content = $_POST['message'];
    $email_id = $_SESSION['email_id'];
    include('function_ticket_chat.php');
    sendMessage($ticket_id, $content, $email_id);
    modifBy($ticket_id, $email_id);
    ticketAttribution($ticket_id,$email_id) ?>
    <script> let msg = confirm("Votre discussion est-elle terminée ?");
if (msg == true)
{
    window.location.href = "my_tickets.php";
}else window.location.href = "chat.php";

</script>
    <?php
}
    if (isset($_POST)) {
        if (isset($_POST['resolved'])) {
            include('function_resolved_ticket.php');
            resolvedTicket($ticket_id);
            header('Location: ticketing.php');
        }
    }
    ?>
                             <form method="post">
                         <textarea name="message"></textarea>
                              <button type="submit" name="send" class="material-symbols-outlined secondary">envoyer</button>
                             </form>
                             <form onsubmit="return confirm('Le ticket est-il bien résolu ?')" action="" method="post">
                                 <button type="submit" name="resolved" class="material-symbols-outlined danger">check</button>
                             </form>
                             <?php
    include_once('function_connect.php');
    $stmt = $sql->prepare("SELECT * FROM messages WHERE ticket_id = '" . $ticket_id . "' ORDER BY `id` DESC");
    $stmt->execute();
    $msgs = $stmt->fetchAll();
    foreach ($msgs as $msg) {
                        ?>
                         <tr>
                             <td><b><?php
        $msg_content = $msg['content'];
        $time = $msg['date'];
        echo $time;
                             if($msg['email_id'] == $_SESSION['email_id']) echo "<p style='color:blue'>$msg_content";
                             else echo "<p style='color:green'>$msg_content"; ?></b></td>
                             <br><br>
                             <td>
                             <form method="post">
                             <input type="hidden" name="user_id" value="<?php echo $msg['id']; ?>">
                             </form>
                                 </div>
                             </td>
                         </tr>
                         <?php }
                         }