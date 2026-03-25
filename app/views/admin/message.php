<?php require APPROOT . '/views/partials/header.php'; ?>

<div style="max-width:1200px; margin:50px auto; padding:20px;">
    <h1 style="margin-bottom:25px;">Contact Messages</h1>

    <div style="overflow-x:auto; background:#15151d; border:1px solid #242433; border-radius:16px; padding:20px;">
        <table style="width:100%; border-collapse:collapse; color:#fff;">
            <thead>
                <tr>
                    <th style="padding:12px; border-bottom:1px solid #2a2a3a; text-align:left;">ID</th>
                    <th style="padding:12px; border-bottom:1px solid #2a2a3a; text-align:left;">Name</th>
                    <th style="padding:12px; border-bottom:1px solid #2a2a3a; text-align:left;">Email</th>
                    <th style="padding:12px; border-bottom:1px solid #2a2a3a; text-align:left;">Subject</th>
                    <th style="padding:12px; border-bottom:1px solid #2a2a3a; text-align:left;">Message</th>
                    <th style="padding:12px; border-bottom:1px solid #2a2a3a; text-align:left;">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($messages)) : ?>
                    <?php foreach ($messages as $message) : ?>
                        <tr>
                            <td style="padding:12px; border-bottom:1px solid #2a2a3a;"><?php echo $message->id; ?></td>
                            <td style="padding:12px; border-bottom:1px solid #2a2a3a;"><?php echo htmlspecialchars($message->name); ?></td>
                            <td style="padding:12px; border-bottom:1px solid #2a2a3a;"><?php echo htmlspecialchars($message->email); ?></td>
                            <td style="padding:12px; border-bottom:1px solid #2a2a3a;"><?php echo htmlspecialchars($message->subject); ?></td>
                            <td style="padding:12px; border-bottom:1px solid #2a2a3a;"><?php echo htmlspecialchars($message->message); ?></td>
                            <td style="padding:12px; border-bottom:1px solid #2a2a3a;"><?php echo htmlspecialchars($message->created_at); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6" style="padding:12px;">No messages found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require APPROOT . '/views/partials/footer.php'; ?>