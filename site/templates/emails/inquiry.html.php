<center><h1>New Inquiry from <?= $name ?></h1></center>
<table style="width: 100%">
    <colgroup>
       <col span="1" style="width: 25%">
       <col span="1" style="width: 75%;">
    </colgroup>
    <tr>
        <td><strong>Artwork</strong></td>
        <td><em><?= $title ?></em></td>
    </tr>
    <tr>
        <td><strong>Artist</strong></td>
        <td><?= $artist ?></td>
    </tr>
    <tr>
        <td><strong>Artwork ID</strong></td>
        <td><?= $artId ?></td>
    </tr>
</table>
<hr>
<table style="width: 100%">
    <colgroup>
       <col span="1" style="width: 25%">
       <col span="1" style="width: 75%;">
    </colgroup>
    <tr>
        <td><strong>From</strong></td>
        <td><?= $name ?></td>
    </tr>
    <tr>
        <td><strong>Email</strong></td>
        <td><?= $email ?></td>
    </tr>
</table>
<hr>
<h4><strong>Message</strong></h4>
<p><?= nl2br($message) ?></p>