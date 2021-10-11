#project merchandiser
project ini di buat sebagai tugas mahasiswa. tujuannya adalah mencatat kunjungan sales ke toko . tujuannya agar lebih terdokumentasi.
project ini dibuat dengan template stisla dan framework php codeigniter dan database mysql

## Table of contents

- [Link Stisla](#link-stisla)
- [Installation](#installation)
- [Usage](#usage)
- [License](#License)

## Link Stisla
- Homepage: [getstisla.com](https://getstisla.com)
- Repository: [github.com/stisla/stisla](https://github.com/stisla/stisla)
- Documentation: [getstisla.com/docs](https://getstisla.com/docs)

## Installation
- [Download the latest release](https://github.com/KhidirDotID/stisla-codeigniter/archive/v1.0.0.zip).
or clone the repo :
```
https://github.com/KhidirDotID/stisla-codeigniter.git
```

## Usage
- Create a new Controller at `application/controllers` then put like this:
```
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_name extends CI_Controller {

	public function index() {A
		$data = array(
			'title' => "Your title"
		);
		$this->load->view('View_name', $data);
	}
?>
```
- Create a new View at `application/views` then put like this:
```
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header'); ?>

      <!-- Main Content -->

<?php
$this->load->view('dist/_partials/footer'); ?>
```

## License

Stisla is under the [MIT License](LICENSE).
