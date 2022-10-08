-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 11 juin 2022 à 11:30
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`, `email`) VALUES
(1, 'abdessalam', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'abdessalam.boulayat@gmail.com'),
(2, 'lahcen', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'lahcen.lorf@gmail.com'),
(3, 'admin', '7c222fb2927d828af22f592134e8932480637c0d', '');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id_category` int(100) NOT NULL,
  `name_category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id_category`, `name_category`) VALUES
(1, 'men'),
(2, 'women'),
(3, 'kids');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  `sujet` varchar(200) NOT NULL,
  `date_message` date NOT NULL DEFAULT current_timestamp(),
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `email`, `message`, `sujet`, `date_message`, `name`) VALUES
(6, 1, 'abdess.bou@gmail.com', 'dlvk;sdknvlxcè', 'livraison en retard', '2022-06-07', ''),
(7, 0, 'abdess.bou@gmail.com', 'livraison en retard', 'livraison en retard', '2022-06-07', ''),
(8, 0, 'abdess.bou@gmail.com', 'livraison en retard', 'livraison en retard', '2022-06-07', 'prenom');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL,
  `method` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address`, `total_products`, `total_price`, `date`, `payment_status`, `method`) VALUES
(3, 1, 'marrakech', ' T-shirt[Categorie: 1, Quantite: 1] Trico[Categorie: 1, Quantite: 1]', 300, '2022-06-07', 'COMPLETED', 'paypal'),
(4, 1, 'marrakech', ' T-shirt[Categorie: 1, Quantite: 1] Trico[Categorie: 1, Quantite: 1]', 300, '2022-06-07', 'COMPLETED', 'paypal'),
(5, 1, 'marrakech', ' T-shirt[Categorie: 1, Quantite: 1] Trico[Categorie: 1, Quantite: 1]', 300, '2022-06-07', 'COMPLETED', 'paypal'),
(6, 1, 'marrakech', ' T-shirt[Categorie: 1, Quantite: 1] Trico[Categorie: 1, Quantite: 1]', 300, '2022-06-07', 'COMPLETED', 'paypal'),
(8, 1, 'marrakech', ' Unisex Jersey Tank[Categorie: 1, Quantite: 1] T-shirt[Categorie: 1, Quantite: 1]', 180, '2022-06-08', 'COMPLETED', 'paypal'),
(34, 1, 'marrakech', ' T-shirt[Categorie: 1, Quantite: 1]', 280, '2022-06-08', 'COMPLETED', 'paypal'),
(35, 1, 'Agadir', ' Unisex Jersey Tank[Categorie: 1, Quantite: 1] T-shirt[Categorie: 1, Quantite: 1]', 460, '2022-06-08', 'COMPLETED', 'paypal'),
(36, 1, 'Agadir', ' T-shirt[Categorie: 1, Quantite: 1]', 100, '2022-06-08', 'COMPLETED', 'paypal'),
(37, 1, 'marrakech', ' Trico[Categorie: 1, Quantite: 1]', 200, '2022-06-08', 'COMPLETED', 'paypal'),
(38, 1, 'Agadir', ' Unisex Jersey Tank[Categorie: 1, Quantite: 1]', 80, '2022-06-08', 'pending', 'paypal'),
(39, 1, 'tiznit', ' Unisex Jersey Tank[Categorie: 1, Quantite: 1]', 80, '2022-06-08', 'pending', 'paypal'),
(40, 1, 'Agadir', ' tshirt33[Categorie: 2, Quantite: 1]', 90, '2022-06-08', 'COMPLETED', 'paypal'),
(41, 1, 'marrakech', ' T-shirt[Categorie: 1, Quantite: 3]', 300, '2022-06-09', 'COMPLETED', 'paypal'),
(42, 2, 'rabat', ' Unisex Jersey Tank[Categorie: 1, Quantite: 2]', 160, '2022-06-09', 'COMPLETED', 'paypal'),
(43, 1, 'marrakech', ' Unisex Jersey[Categorie: 1, Quantite: 1]', 80, '2022-06-09', 'COMPLETED', 'paypal'),
(44, 2, 'agadir', ' Unisex Jersey[Categorie: 1, Quantite: 1]', 80, '2022-06-10', 'COMPLETED', 'paypal'),
(45, 1, 'marrakech', ' T-shirt[Categorie: 1, Quantite: 1] Unisex Jersey[Categorie: 1, Quantite: 2]', 260, '2022-06-10', 'COMPLETED', 'paypal');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(10) NOT NULL,
  `image_01` varchar(100) NOT NULL,
  `image_02` varchar(100) NOT NULL,
  `image_03` varchar(100) NOT NULL,
  `id_category` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `details`, `price`, `image_01`, `image_02`, `image_03`, `id_category`) VALUES
(3, 'Trico', 'Un vêtement est un article d’habillement servant à couvrir une partie du corps humain. Il est le plus souvent en tissu mais les matériaux utilisés pour sa fabrication tendent à se diversifier au fil des siècles. La raison d’être d\'un vêtement varie fortement selon les cultures et les périodes de l’histoire : pratique (protection), symbolique (signaler une posture morale) ou encore sociale (afficher un statut).', 200, 'black_3.jpg', 'EmeraldTriblend_3.jpg', 'TrueRoyalTriblend_3.jpg', 1),
(4, 'T-shirt', 'Un vêtement est un article d’habillement servant à couvrir une partie du corps humain. Il est le plus souvent en tissu mais les matériaux utilisés pour sa fabrication tendent à se diversifier au fil des siècles. La raison d’être d\'un vêtement varie fortement selon les cultures et les périodes de l’histoire : pratique (protection), symbolique (signaler une posture morale) ou encore sociale (afficher un statut).', 100, 'SolidBlackTriblend_4.jpg', 'EmeraldTriblend_4.jpg', 'AquaTriblend_4.jpg', 1),
(5, 'Unisex Jersey', 'Un vêtement est un article d’habillement servant à couvrir une partie du corps humain. Il est le plus souvent en tissu mais les matériaux utilisés pour sa fabrication tendent à se diversifier au fil des siècles. La raison d’être d\'un vêtement varie fortement selon les cultures et les périodes de l’histoire : pratique (protection), symbolique (signaler une posture morale) ou encore sociale (afficher un statut).', 80, 'EmeraldTriblend_5.jpg', 'Black_5.jpg', 'AquaTriblend_5.jpg', 1),
(6, 'tshirt33', 'Un vêtement est un article d’habillement servant à couvrir une partie du corps humain. Il est le plus souvent en tissu mais les matériaux utilisés pour sa fabrication tendent à se diversifier au fil des siècles. La raison d’être d\'un vêtement varie fortement selon les cultures et les périodes de l’histoire : pratique (protection), symbolique (signaler une posture morale) ou encore sociale (afficher un statut).', 90, '1.jpg', '2.png', '3.jpg', 2),
(7, 'Infant Baby Rib Bodysuit', 'Un vêtement est un article d’habillement servant à couvrir une partie du corps humain. Il est le plus souvent en tissu mais les matériaux utilisés pour sa fabrication tendent à se diversifier au fil des siècles. La raison d’être d\'un vêtement varie fortement selon les cultures et les périodes de l’histoire : pratique (protection), symbolique (signaler une posture morale) ou encore sociale (afficher un statut).', 70, '5.jpg', '6.jpg', '7.jpg', 3),
(9, 'Crewneck Sweatshirt', 'Un vêtement est un article d’habillement servant à couvrir une partie du corps humain. Il est le plus souvent en tissu mais les matériaux utilisés pour sa fabrication tendent à se diversifier au fil des siècles. La raison d’être d\'un vêtement varie fortement selon les cultures et les périodes de l’histoire : pratique (protection), symbolique (signaler une posture morale) ou encore sociale (afficher un statut).', 150, '82.jpg', '81.jpg', '8.jpg', 1),
(10, ' Heavy Blend', 'Un vêtement est un article d’habillement servant à couvrir une partie du corps humain. Il est le plus souvent en tissu mais les matériaux utilisés pour sa fabrication tendent à se diversifier au fil des siècles. La raison d’être d&#39;un vêtement varie fortement selon les cultures et les périodes de l’histoire : pratique (protection), symbolique (signaler une posture morale) ou encore sociale (afficher un statut).', 200, '93.jpg', '92.jpg', '91.jpg', 2),
(11, 'Jacket', 'Un vêtement est un article d’habillement servant à couvrir une partie du corps humain. Il est le plus souvent en tissu mais les matériaux utilisés pour sa fabrication tendent à se diversifier au fil des siècles. La raison d’être d&#39;un vêtement varie fortement selon les cultures et les périodes de l’histoire : pratique (protection), symbolique (signaler une posture morale) ou encore sociale (afficher un statut).', 200, '100.jpg', '99.jpg', '98.jpg', 2),
(12, 'sport trousers', 'Un vêtement est un article d’habillement servant à couvrir une partie du corps humain. Il est le plus souvent en tissu mais les matériaux utilisés pour sa fabrication tendent à se diversifier au fil des siècles. La raison d’être d&#39;un vêtement varie fortement selon les cultures et les périodes de l’histoire : pratique (protection), symbolique (signaler une posture morale) ou encore sociale (afficher un statut).', 80, '96.jpg', '95.jpg', '94.jpg', 2),
(13, 'Sweatshirt', 'Un vêtement est un article d’habillement servant à couvrir une partie du corps humain. Il est le plus souvent en tissu mais les matériaux utilisés pour sa fabrication tendent à se diversifier au fil des siècles. La raison d’être d&#39;un vêtement varie fortement selon les cultures et les périodes de l’histoire : pratique (protection), symbolique (signaler une posture morale) ou encore sociale (afficher un statut).', 150, '102.jpg', '101.jpg', '103.jpg', 3),
(14, 'Jacket 1', 'Un vêtement est un article d’habillement servant à couvrir une partie du corps humain. Il est le plus souvent en tissu mais les matériaux utilisés pour sa fabrication tendent à se diversifier au fil des siècles. La raison d’être d&#39;un vêtement varie fortement selon les cultures et les périodes de l’histoire : pratique (protection), symbolique (signaler une posture morale) ou encore sociale (afficher un statut).', 200, '104.jpg', '105.jpg', '106.jpg', 3),
(15, 'Sweatshirt 1', 'Un vêtement est un article d’habillement servant à couvrir une partie du corps humain. Il est le plus souvent en tissu mais les matériaux utilisés pour sa fabrication tendent à se diversifier au fil des siècles. La raison d’être d&#39;un vêtement varie fortement selon les cultures et les périodes de l’histoire : pratique (protection), symbolique (signaler une posture morale) ou encore sociale (afficher un statut).', 120, '109.jpg', '108.jpg', '110.jpg', 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'abdessalam', 'abdess.bou@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
(2, 'nom', 'email@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(3, 'nom', 'email.email@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(8, 'lahcen', 'lahcen@gmail.com', '6fb42da0e32e07b61c9f0251fe627a9c');

-- --------------------------------------------------------

--
-- Structure de la table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`) VALUES
(13, 1, 6),
(15, 2, 9),
(16, 2, 5),
(18, 2, 6),
(24, 1, 7),
(26, 1, 3),
(30, 1, 13),
(31, 1, 12),
(34, 1, 9),
(36, 1, 5);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
