<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
	<?php 
		public function index();
    {
        $users = DB::table('users')->get();

        return view('user.index', ['users' => $users]);
    }
	?>

</body>
</html>