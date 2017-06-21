<?PHP SELF::RENDERvIEW('PARTIALS/HEADER', $MODEL) ?>
<MAIN ID="MAIN">
    <DIV CLASS="HEADER">
        <H1><?PHP SELF::ACTIONlINK('pROFILE', 'iNDEX', 'dISCUSSION', NULL, 'BACK-LINK'); ?> / yOUR pOSTS</H1>
    </DIV>

    <DIV CLASS="CONTENT">
        <P></P>
        <?PHP IF(SIZEOF($MODEL['POSTS']) > 0): ?>
            <SECTION>
                <?PHP SELF::RENDERvIEW('PARTIALS/POSToVERVIEWrOW', ARRAY(
                    'POSTS' => $MODEL['POSTS'],
                    'CSStITLEbARcLASS' => 'POST-TITLE-BAR',
                    'CSStEXTcLASS' => 'POST-TEXT'
                )); ?>
            </SECTION>

        <?PHP ELSE: ?>
            <?PHP SELF::RENDERvIEW('PARTIALS/404', ARRAY(
               'MESSAGE' => 'nO POSTS FOUND.'
            )); ?>
        <?PHP ENDIF; ?>
    </DIV>
</MAIN>
<?PHP SELF::RENDERvIEW('PARTIALS/FOOTER', $MODEL) ?>
