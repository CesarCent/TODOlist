
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `todo_db`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Category` (
	IN `_name` VARCHAR(30)
)begin
	insert into category(name) values( lower(_name) );
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `complete_task` (
	IN `_id` INT
)begin
	update task set completed = 1 where id = _id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `destroy_category` (
	IN `_id` INT
)begin 
	delete from category where id = _id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `destroy_task` (
	IN `_id` INT
)begin
	delete from task where id = _id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_task_by_id` (
	IN `_id` INT
)begin
	SELECT * from task where id = _id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Task` (
	IN `_category` INT,
	IN `_name` VARCHAR(30), 
	IN `_description` TEXT, 
	IN `_finishDate` DATE
)begin
	insert into task ( category , name , description , creationDate, finishDate )
	values ( _category , _name , _description , CURDATE(), _finishDate);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_category` (
	IN `_id` INT,
	IN `_name` VARCHAR(30)
)begin
	UPDATE category SET  name = _name where id = _id; 
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_task` (
	IN `_id` INT, 
	IN `_category` INT, 
	IN `_name` VARCHAR(30), 
	IN `_description` TEXT, 
	IN `_finishDate` DATE
)begin
	UPDATE task SET category = _category, name = _name, description = _description, finishDate = _finishDate where id = _id; 
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(7, 'study'),
(8, 'hobby'),
(10, 'work');

--
-- Disparadores `category`
--
DELIMITER $$
CREATE TRIGGER `onDeletedCategory` BEFORE DELETE ON `category` FOR EACH ROW begin
		delete from task where task.category = OLD.id;
	end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `creationDate` date DEFAULT NULL,
  `finishDate` date DEFAULT NULL,
  `completed` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `task`
--

INSERT INTO `task` (`id`, `category`, `name`, `description`, `creationDate`, `finishDate`, `completed`) VALUES
(27, 8, 'See a movie', 'Seach a movie in Netflix!', '2020-08-15', '2020-08-22', 1),
(28, 7, 'Vue JS', 'Make the same TODO web but this time with Vue JS and Laravel (or spring boot?)', '2020-08-15', '2020-08-30', 0),
(29, 7, 'Read', 'Prepare myself for a hard exam!', '2020-08-15', '2020-08-26', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;