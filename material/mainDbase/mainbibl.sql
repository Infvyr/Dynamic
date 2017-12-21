-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql108.byethost7.com
-- Generation Time: Jul 06, 2016 at 05:58 AM
-- Server version: 5.6.30-76.3
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `b7_18455643_mainbibl`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(48) NOT NULL,
  `halfArticle` varchar(1024) NOT NULL,
  `fullArticle` mediumtext NOT NULL,
  `calendar` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `halfArticle`, `fullArticle`, `calendar`) VALUES
(1, 'Program de lucru 2015', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod consectetur quam quisquam id nesciunt, laboriosam voluptates iure et deleniti? Distinctio repudiandae maiores libero officiis, minus, exercitationem dicta numquam quibusdam aliquid, iusto harum quod voluptate autem deleniti nobis sapiente. Sapiente quis reprehenderit accusamus id dolorem iste magnam praesentium incidunt, distinctio, repudiandae? Beatae ducimus totam iusto illo sapiente reprehenderit inventore deleniti molestiae placeat velit ut magni consequuntur, esse nesciunt itaque consectetur ipsam veritatis minus architecto pariatur aliquam quam illum, quos iure! Cumque illum veniam expedita veritatis tenetur accusantium quia magni, officiis magnam excepturi modi.', ' Nulla faucibus, est quis sollicitudin convallis, lacus leo tincidunt lectus, et tincidunt ante magna id tellus. Vivamus eu sem nibh. Morbi cursus efficitur feugiat. Vivamus eros velit, bibendum sit amet magna sollicitudin, commodo posuere sapien. Curabitur interdum dui justo. Nullam blandit at ligula sit amet eleifend. Praesent cursus sem a gravida egestas. In ut ex ac erat sagittis fermentum quis sed mauris. Nulla vitae semper velit.\n\nCum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur interdum placerat commodo. Donec elementum facilisis massa, vel bibendum mauris volutpat nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut augue sed lorem ultricies cursus a ac nulla. Donec euismod, ante et gravida consequat, libero augue eleifend turpis, ac mollis purus sem vitae lacus. Mauris faucibus lectus volutpat enim interdum, eu sodales ex condimentum. Aenean mollis tellus a arcu consequat, id volutpat ex sagittis.\n\nProin molestie turpis vel nisl rhoncus, non sollicitudin eros maximus. Cras commodo porta fringilla. Cras convallis est sed nibh accumsan, sed pretium turpis ultricies. Vivamus ac placerat ante. Donec tortor quam, dapibus et magna id, consequat dignissim quam. Proin rutrum orci dictum, tincidunt magna in, pellentesque tellus. Cras congue urna enim, sed lacinia urna ullamcorper sit amet. Cras fringilla efficitur enim. Sed vitae pretium nisl, vel commodo leo. Aliquam quis convallis ex. Pellentesque dictum nibh ut tincidunt pharetra. Nunc lacinia lacus ac lacinia sagittis. Quisque placerat fermentum vehicula.\n\nMaecenas cursus mauris in elit lacinia laoreet. Aenean interdum turpis in ante bibendum, ut mollis est tincidunt. Nullam fermentum nec purus ut faucibus. Aliquam feugiat feugiat urna. Praesent a augue rutrum odio rhoncus maximus id id mauris. Pellentesque sit amet porttitor est, in aliquet arcu. Aenean tincidunt eros arcu, non aliquet purus euismod eu. Duis pellentesque porttitor accumsan. Sed pulvinar nisl nisl, nec tincidunt urna viverra ut. Vivamus sit amet tellus sed mauris maximus ultricies. Vestibulum aliquet, arcu eget vehicula ultricies, metus nisi vulputate tortor, eget pellentesque metus lorem quis ligula. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In hac habitasse platea dictumst. Sed placerat tincidunt tellus, non viverra quam malesuada nec. Fusce feugiat congue fringilla.\n\nDonec sed ligula aliquet, faucibus felis non, pulvinar orci. Sed ipsum nulla, rutrum nec nisl sed, egestas sollicitudin ligula. Morbi mi orci, porttitor scelerisque hendrerit a, cursus maximus massa. ', '2015-11-26'),
(2, 'Raport de activitate 2014', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod consectetur quam quisquam id nesciunt, laboriosam voluptates iure et deleniti? Distinctio repudiandae maiores libero officiis, minus, exercitationem dicta numquam quibusdam aliquid, iusto harum quod voluptate autem deleniti nobis sapiente. Sapiente quis reprehenderit accusamus id dolorem iste magnam praesentium incidunt, distinctio, repudiandae?', ' Cras vestibulum auctor nisi, quis semper lectus sodales sed. Pellentesque sit amet est eget enim tempor congue eu accumsan augue. Vivamus lobortis vehicula nisl. Proin eget fermentum risus, at pretium mi. In hac habitasse platea dictumst. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur vitae eros tellus. Sed tempus sem nulla, vel volutpat ante porta nec. Aenean in velit ac urna commodo mollis.\n\nDonec tristique eros et mi vestibulum tincidunt. Sed et dolor dictum nulla semper tempus sed vel nisl. Donec nec enim at odio auctor pretium sit amet et nisi. Maecenas vulputate, mi non euismod elementum, turpis sapien convallis enim, sit amet iaculis tellus diam id enim. Sed nisi magna, fermentum in malesuada at, vestibulum at tellus. Pellentesque id libero sit amet erat condimentum tristique sit amet vitae sem. Sed nibh leo, dapibus a finibus sit amet, ornare in mi. Cras metus quam, congue sed nisl sed, pellentesque tincidunt turpis. Mauris vitae mi vitae arcu ornare semper et ut turpis. Donec tristique, lacus ut viverra venenatis, elit tellus vulputate leo, sed feugiat leo dui quis tellus. Aliquam nec lacus tincidunt, egestas arcu eget, imperdiet justo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean et erat lectus. Sed sollicitudin tincidunt leo, et rutrum libero ullamcorper vitae. Ut non posuere metus, sit amet imperdiet ex. Integer imperdiet justo eu urna sollicitudin laoreet.\n\nInteger malesuada sollicitudin odio, ac gravida diam. Vivamus consequat eros quis erat varius pulvinar. Nunc accumsan arcu magna, nec commodo lectus eleifend non. Fusce at felis metus.', '2016-01-30'),
(3, 'Raport de activitate 2015', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod consectetur quam quisquam id nesciunt, laboriosam voluptates iure et deleniti? Distinctio repudiandae maiores libero officiis, minus, exercitationem dicta numquam quibusdam aliquid, iusto harum quod voluptate autem deleniti nobis sapiente. Sapiente quis reprehenderit accusamus id dolorem iste magnam praesentium incidunt, distinctio, repudiandae? Beatae ducimus totam iusto illo sapiente reprehenderit inventore deleniti molestiae placeat velit ut magni consequuntur, esse nesciunt itaque consectetur ipsam veritatis minus architecto pariatur aliquam quam illum, quos iure!', ' Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse porttitor ex orci. Suspendisse et auctor nibh, sed malesuada velit. Integer laoreet lectus vitae volutpat viverra. Vestibulum sagittis risus orci, et sodales eros varius gravida. Suspendisse porttitor, elit eu porta consequat, leo mauris consequat enim, eu posuere eros dui ut dolor. Morbi eu lacus sit amet neque hendrerit sagittis ut sit amet est. Donec convallis augue nisl, quis ultrices quam auctor vel.\n\nNam efficitur ipsum erat, tristique lacinia lectus dapibus non. Nullam ultrices felis in odio tristique cursus. Curabitur tincidunt volutpat risus sed consectetur. Nulla in ante tincidunt, aliquet sapien vitae, iaculis quam. Nam laoreet neque id risus auctor euismod. In vitae pharetra tortor. Nam cursus interdum dui a finibus. Fusce tempus odio vitae urna tincidunt, vel ultrices dolor vulputate. Aliquam erat volutpat. Nunc nunc augue, feugiat quis ornare id, vestibulum non ligula. Nullam erat enim, hendrerit vitae elit a, vestibulum cursus diam. Etiam finibus justo at tellus sollicitudin faucibus.\n\nQuisque ullamcorper faucibus turpis vitae porttitor. Sed faucibus aliquam dolor, sit amet efficitur risus euismod at. Maecenas sit amet elit ac purus blandit varius id id sapien. Ut eget quam nec dui euismod pellentesque vitae id lorem. Praesent venenatis mi nec fermentum molestie. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque elit lacus, gravida at neque porta, luctus tincidunt erat.', '2015-10-05'),
(4, 'Program de lucru 2016', 'El fragment estàndard de Lorem Ipsum fet servir des del 1500 es reprodueix a continuació per tots aquells interessats. ', 'El fragment estàndard de Lorem Ipsum fet servir des del 1500 es reprodueix a continuació per tots aquells interessats. Les seccions 1.10.32 i 1.10.33 de "De Finibus Bonorum et Malorum" de Ciceró es reprodueixen en la seva forma original, acompanyades de les versions angleses de la traducció de 1914 feta per H. Rackham.', '2015-12-24');

-- --------------------------------------------------------

--
-- Table structure for table `despre`
--

CREATE TABLE IF NOT EXISTS `despre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aboutInfo` varchar(2048) NOT NULL COMMENT 'textul de pe pagina ''despre''',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `despre`
--

INSERT INTO `despre` (`id`, `aboutInfo`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, tenetur nesciunt accusamus perferendis labore, doloremque molestias. Ipsam est vero minus illo quo debitis qui! Praesentium cum nihil ipsam, laboriosam nisi?\n                Quos blanditiis eligendi veritatis mollitia eum sequi deserunt praesentium, exercitationem a. Vero aut, corrupti a, laboriosam, architecto eaque sapiente fugit voluptas numquam animi ipsam ea qui blanditiis at ipsum repellat!\n                Animi quasi minus facere quo! Debitis, similique, pariatur? Minus laudantium harum consequuntur vel a quibusdam sint aut officiis suscipit, perspiciatis eos magni incidunt eveniet illum necessitatibus est non inventore quia.\n                Natus laudantium illum nobis, nihil inventore, obcaecati corporis dolore iste voluptas odit. Maiores dolorem iste aut quisquam eum, cumque rem non optio reiciendis? Iure optio eum obcaecati similique et quae.'),
(2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic cumque fugit alias, dolor maxime libero, sapiente, repudiandae culpa provident blanditiis maiores optio dolorem! Dignissimos et mollitia, a, beatae fuga voluptatem.\nDoloremque sequi veritatis tempora ad. Nihil officia eum dolores ab odio deleniti placeat, doloremque dicta, maiores saepe vero rerum! Dolore officia sed aperiam consequatur dignissimos veniam, nulla, laborum aspernatur harum!\nEius atque nostrum, nisi sint nam voluptates, molestias maiores optio, repudiandae, corporis reiciendis consequatur. Voluptates, culpa quisquam quae tenetur facere eius aspernatur animi autem sapiente praesentium. Voluptatibus sunt, expedita officia.\n                Amet cum ex, nihil modi minus eos reiciendis doloremque ea numquam veniam at quos sapiente enim neque quas expedita praesentium quam est. Veritatis, accusantium eaque laudantium natus soluta mollitia molestiae.\n                Neque omnis consequuntur odit at quam rem molestias, ducimus cum nemo eos qui fugit dolore voluptates iste, doloribus libero animi praesentium autem quod molestiae enim eaque! Molestias dolorem, ex consequuntur!\n                Velit libero eius voluptatibus ducimus nemo, nulla quaerat cumque qui nesciunt beatae, ipsa, enim pariatur laudantium facere fugiat ea quasi eligendi molestias architecto praesentium fugit harum modi aperiam. Quam, delectus.\n                Nobis sit, perspiciatis, iure quas suscipit recusandae, laudantium quam perferendis omnis velit veniam, libero aperiam voluptatibus officia voluptatem laborum. Alias eaque temporibus numquam doloribus nostrum, explicabo quos expedita quae harum.');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE IF NOT EXISTS `quotes` (
  `quotes_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content_quote` varchar(255) CHARACTER SET utf8 NOT NULL,
  `auth_quote` varchar(48) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`quotes_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`quotes_id`, `content_quote`, `auth_quote`) VALUES
(1, 'Soarta multor oameni a atârnat de faptul că în casa părinţilor lor a fost sau nu o bibliotecă.', 'Edmondo de Amicis'),
(2, 'Biblioteca este patria cuvintelor care au avut ceva de spus.', 'Octav Bibere'),
(3, 'Biblioteca este prietenul şi ajutorul cititorului.', 'Lenin'),
(4, 'Biblioteca este templul învăţăturii, iar învăţătura a eliberat mai mulţi oameni decât toate războaiele din istorie.', 'Carl Thomas Rowan'),
(5, 'Dacă ai o grădină şi o bibliotecă, ai tot ceea ce îţi trebuie.', 'Cicero'),
(6, 'Biblioteca este şcoala vieţii care ne învaţă nu pentru notă sau certificat, ci pentru nevoile imperioase ale existenţei şi misiunea pe care o avem ca individ în societate.', 'Aurel Filimon'),
(7, 'O casă care are în interiorul său o bibliotecă are suflet.', 'Platon'),
(8, 'Folosul unei biblioteci mari este că ea sperie pe cel care o privește.', 'Voltaire'),
(9, 'O mică bibliotecă ce creşte în fiecare an este o parte onorabilă din istoria unui om.', 'Henry Ward Beecher'),
(10, 'O bibliotecă nu este un lux, ci una din necesităţile vieţii.', 'Henry Ward Beecher'),
(11, 'Biblioteca este un cabinet magic în care există mai multe spirite vrăjite', 'Jorge Luis Borges'),
(12, 'Devine plictisitor să scrii cărţi pline de fantezie care nu influenţează imaginaţii, şi în cele din urmă chiar încetezi să le mai planifici.', 'H. G. Wells '),
(13, 'Casa fără cărţi e o casă fără demnitate.', 'Edmondo de Amicis'),
(14, 'Întregul suflet al timpurilor trecute sălăşluieşte în cărţi. Ele sunt vocea clară şi puternică a trecutului care se face auzită când trupul şi substanţa materială a acestuia a dispărut ca un vis.', 'Thomas Carlyle'),
(15, 'Nici un loc nu-ţi oferă o mai puternică convingere a zădărniciei speranţelor umane ca o bibliotecă publică.', 'Samuel Johnson'),
(16, 'Întoarcem pe dos o jumătate de bibliotecă pentru a scrie o singură carte.', 'Samuel Johnson');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
