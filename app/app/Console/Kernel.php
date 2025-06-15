$schedule->call(function () {
    DB::table('inscriptions')
        ->where('created_at', '<', now()->subMonth())
        ->delete();
})->daily();

$schedule->command('export:inscriptions')->weekly();