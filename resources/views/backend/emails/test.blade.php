Ciao {{ $user->first_name . ' ' . $user->last_name }}, dall'analisi dei dati nei nostri sistemi risultano prossime le seguenti scandenze:
<br>
<br>
<b>
    @if ($matchedColumns == 'minimum_activity_deadline')
        Scadenza Attività Minima  :  {{$user->minimum_activity_deadline}}
    @elseif ($matchedColumns == 'release_test_deadline')
        Scadenza Del Test Di Rilascio :  {{$user->release_test_deadline}}
    @elseif ($matchedColumns == 'insurance_expiration')
        Scadenza Assicurativa : {{$user->insurance_expiration}}
    @elseif ($matchedColumns == 'medical_examination_deadline')
        Scadenza Visita Medica : {{$user->medical_examination_deadline}}
    @elseif ($matchedColumns == 'expiry_date')
        Data Di Scadenza Del Rimborso : {{$user->repayment_expiry_date}}
    @endif
</b>
<br>
<br>
Le scadenze sopracitate sono ancora in corso di validità fino alla data segnalata. Questo messaggio è un semplice promemoria per consentirti di pianificare il rinnovo delle stesse.
<br>
Per non ricevere email in futuro dal servizio ALERT di SKYDIVE VERONA inviaci una email con scritto NON VOGIO PIU' ESSERE AGGIORNATO all'indirizzo info@paracadutismoverona.it
<br>
Mail inviata in automatico dal nostro portale WEB www.paracadutismoverona.it
<br>
Le informazioni, i dati e le notizie contenute nella presente comunicazione e i relativi allegati sono di natura privata e come tali possono essere riservati e sono destinati esclusivamente ai destinatari indicati. La diffusione, distribuzione e/o la copiatura del documento trasmesso da parte di qualsiasi soggetto diverso dal destinatario risulta proibita, sia ai sensi dell'art. 616 c.p., che ai sensi del Regolamento (UE) 2016/679.
Se avete ricevuto questo messaggio per errore, vi preghiamo di distruggerlo e di darcene immediata comunicazione inviando un messaggio di risposta all'indirizzo e-mail info@paracadutismoverona.it
