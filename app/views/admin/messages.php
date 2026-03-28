<?php require APPROOT . '/views/partials/admin_header.php'; ?>

<style>
.messages-card{overflow:hidden;border-radius:22px;background:linear-gradient(180deg,rgba(255,255,255,.05),rgba(255,255,255,.03));border:1px solid rgba(255,255,255,.08);box-shadow:0 16px 36px rgba(0,0,0,.22);}
.messages-header{padding:22px 24px;border-bottom:1px solid rgba(255,255,255,.08);}
.messages-header h2{margin-bottom:6px;}
.messages-header p{color:#94a3b8;}
.table-wrap{overflow-x:auto;}
.messages-table{min-width:980px;width:100%;border-collapse:collapse;}
.messages-table th,.messages-table td{padding:16px;border-bottom:1px solid rgba(255,255,255,.06);text-align:left;vertical-align:top;}
.messages-table th{color:#dbe7f5;background:rgba(255,255,255,.04);font-size:14px;}
.messages-table td{color:#d4deec;}
.message-text{max-width:360px;white-space:normal;line-height:1.7;color:#b8c7da;}
.empty-row{text-align:center;color:#94a3b8;padding:28px;}
</style>

<div class="messages-card">
    <div class="messages-header">
        <h2>Customer Messages</h2>
        <p>Read messages sent from the contact form in one clean table.</p>
    </div>

    <div class="table-wrap">
        <table class="messages-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($messages)): ?>
                    <?php foreach($messages as $message): ?>
                        <tr>
                            <td><?php echo $message->id; ?></td>
                            <td><?php echo htmlspecialchars($message->name); ?></td>
                            <td><?php echo htmlspecialchars($message->email); ?></td>
                            <td><?php echo htmlspecialchars($message->subject); ?></td>
                            <td class="message-text"><?php echo nl2br(htmlspecialchars($message->message)); ?></td>
                            <td><?php echo htmlspecialchars($message->created_at); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="empty-row">No messages found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require APPROOT . '/views/partials/admin_footer.php'; ?>