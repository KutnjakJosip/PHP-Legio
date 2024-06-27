create table vijest(
   `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `naslov` varchar(255) NOT NULL,
    `sazetak` text NOT NULL,
  `vijest` text NOT NULL,
  `kategorija` varchar(255) NOT NULL,
  `sakriti` boll NOT NULL 
);


CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `ime` varchar(255) NOT NULL,
  `prezime` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `korisnickoime` varchar(255) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `grad` char(2) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `arhiva` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



create table dojmovi(
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `ime` varchar(255) NOT NULL,
  `prezime` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `komentar` text NOT NULL
)