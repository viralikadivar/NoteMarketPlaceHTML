-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2021 at 07:05 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notesmarketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `CountryCode` varchar(100) NOT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp(),
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- --------------------------------------------------------

--
-- Table structure for table `notecategories`
--

CREATE TABLE `notecategories` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp(),
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `notesattachments`
--

CREATE TABLE `notesattachments` (
  `ID` int(11) NOT NULL,
  `NoteID` int(11) NOT NULL,
  `FileName` varchar(100) NOT NULL,
  `FilePath` varchar(500) NOT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp(),
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `notesdetails`
--

CREATE TABLE `notesdetails` (
  `ID` int(11) NOT NULL,
  `SellerID` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `ActionedBy` int(11) DEFAULT NULL,
  `AdminRemarks` varchar(255) DEFAULT NULL,
  `PublishedDate` datetime DEFAULT NULL,
  `Title` varchar(100) NOT NULL,
  `Category` int(11) NOT NULL,
  `DisplayPicture` varchar(500) DEFAULT NULL,
  `NoteType` int(11) DEFAULT NULL,
  `NumberofPages` int(11) DEFAULT NULL,
  `Description` varchar(255) NOT NULL,
  `UniversityName` varchar(200) DEFAULT NULL,
  `Country` int(11) DEFAULT NULL,
  `Course` varchar(100) DEFAULT NULL,
  `CourseCode` varchar(100) DEFAULT NULL,
  `Professor` varchar(100) DEFAULT NULL,
  `IsPaid` int(11) NOT NULL,
  `SellingPrice` int(100) DEFAULT NULL,
  `NotesPreview` varchar(500) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp(),
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notesdownloads`
--

CREATE TABLE `notesdownloads` (
  `ID` int(11) NOT NULL,
  `NoteID` int(11) NOT NULL,
  `Seller` int(11) NOT NULL,
  `Downloader` int(11) NOT NULL,
  `IsSellerHasAllowedDownload` bit(1) NOT NULL,
  `AttachmentPath` varchar(255) DEFAULT NULL,
  `IsAttachmentDownloaded` bit(1) NOT NULL,
  `AttachmentDownloadedDate` datetime DEFAULT NULL,
  `IsPaid` bit(1) NOT NULL,
  `PurchasedPrice` decimal(10,0) DEFAULT NULL,
  `NoteTitle` varchar(100) NOT NULL,
  `NoteCategory` varchar(100) NOT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp(),
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notesreviews`
--

CREATE TABLE `notesreviews` (
  `ID` int(11) NOT NULL,
  `NoteID` int(11) NOT NULL,
  `ReviewedByID` int(11) NOT NULL,
  `AgainstDownloadsID` int(11) NOT NULL,
  `Ratings` decimal(10,0) NOT NULL,
  `Comments` varchar(255) NOT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp(),
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notetypes`
--

CREATE TABLE `notetypes` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp(),
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `referencedata`
--

CREATE TABLE `referencedata` (
  `ID` int(11) NOT NULL,
  `Value` varchar(100) NOT NULL,
  `Datavalue` varchar(100) NOT NULL,
  `RefCategory` varchar(100) NOT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp(),
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `referencedata`
--

INSERT INTO `referencedata` (`ID`, `Value`, `Datavalue`, `RefCategory`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'Male', 'M', 'Gender', '2021-02-20 10:21:20', NULL, NULL, NULL, b'1'),
(2, 'Female', 'Fe', 'Gender', NULL, NULL, NULL, NULL, b'1'),
(3, 'Unknown', 'U', 'Gender', NULL, NULL, NULL, NULL, b'0'),
(4, 'Paid', 'P', 'Selling Mode', NULL, NULL, NULL, NULL, b'1'),
(5, 'Free', 'F', 'Selling Mode', NULL, NULL, NULL, NULL, b'1'),
(6, 'Draft', 'Draft', 'Notes Status', NULL, NULL, NULL, NULL, b'1'),
(7, 'Submitted For Review', 'Submitted For Review', 'Notes Status', NULL, NULL, NULL, NULL, b'1'),
(8, 'In Review', 'In Review', 'Notes Status', NULL, NULL, NULL, NULL, b'1'),
(9, 'Published', 'Approved', 'Notes Status', NULL, NULL, NULL, NULL, b'1'),
(10, 'Rejected', 'Rejected', 'Notes Status', NULL, NULL, NULL, NULL, b'1'),
(11, 'Removed', 'Removed', 'Notes Status', NULL, NULL, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `reportedissues`
--

CREATE TABLE `reportedissues` (
  `ID` int(11) NOT NULL,
  `NoteID` int(11) NOT NULL,
  `ReportedByID` int(11) NOT NULL,
  `AgainstDownloadID` int(11) NOT NULL,
  `Remarks` varchar(255) NOT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp(),
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `systemconfiguration`
--

CREATE TABLE `systemconfiguration` (
  `ID` int(11) NOT NULL,
  `KeyFields` varchar(100) NOT NULL,
  `Value` varchar(500) NOT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp(),
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `DOB` datetime DEFAULT NULL,
  `Gender` int(11) DEFAULT NULL,
  `SecondaryEmailAddress` varchar(100) DEFAULT NULL,
  `PhonenNumberCountryCode` varchar(100) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `ProfilePicture` varchar(500) DEFAULT NULL,
  `AddressLine1` varchar(100) NOT NULL,
  `AddressLine2` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `ZipCode` varchar(50) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `University` varchar(100) DEFAULT NULL,
  `College` varchar(100) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp(),
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE `userroles` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp(),
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `EmailID` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `IsEmailVerified` bit(1) NOT NULL DEFAULT b'0',
  `CreatedDate` datetime DEFAULT current_timestamp(),
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`),
  ADD UNIQUE KEY `CountryCode` (`CountryCode`);

--
-- Indexes for table `notecategories`
--
ALTER TABLE `notecategories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `notesattachments`
--
ALTER TABLE `notesattachments`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NoteID` (`NoteID`);

--
-- Indexes for table `notesdetails`
--
ALTER TABLE `notesdetails`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `SellerID` (`SellerID`),
  ADD KEY `Status` (`Status`),
  ADD KEY `ActionedBy` (`ActionedBy`),
  ADD KEY `Category` (`Category`),
  ADD KEY `NoteType` (`NoteType`),
  ADD KEY `Country` (`Country`),
  ADD KEY `IsPaid` (`IsPaid`);

--
-- Indexes for table `notesdownloads`
--
ALTER TABLE `notesdownloads`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NoteID` (`NoteID`),
  ADD KEY `Seller` (`Seller`),
  ADD KEY `Downloader` (`Downloader`);

--
-- Indexes for table `notesreviews`
--
ALTER TABLE `notesreviews`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NoteID` (`NoteID`),
  ADD KEY `ReviewedByID` (`ReviewedByID`),
  ADD KEY `AgainstDownloadsID` (`AgainstDownloadsID`);

--
-- Indexes for table `notetypes`
--
ALTER TABLE `notetypes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `referencedata`
--
ALTER TABLE `referencedata`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reportedissues`
--
ALTER TABLE `reportedissues`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NoteID` (`NoteID`),
  ADD KEY `ReportedByID` (`ReportedByID`),
  ADD KEY `AgainstDownloadID` (`AgainstDownloadID`);

--
-- Indexes for table `systemconfiguration`
--
ALTER TABLE `systemconfiguration`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `Gender` (`Gender`),
  ADD KEY `Country` (`Country`),
  ADD KEY `PhonenNumberCountryCode` (`PhonenNumberCountryCode`);

--
-- Indexes for table `userroles`
--
ALTER TABLE `userroles`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EmailID` (`EmailID`),
  ADD KEY `RoleID` (`RoleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT for table `notecategories`
--
ALTER TABLE `notecategories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notesattachments`
--
ALTER TABLE `notesattachments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `notesdetails`
--
ALTER TABLE `notesdetails`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `notesdownloads`
--
ALTER TABLE `notesdownloads`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notesreviews`
--
ALTER TABLE `notesreviews`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notetypes`
--
ALTER TABLE `notetypes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `referencedata`
--
ALTER TABLE `referencedata`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reportedissues`
--
ALTER TABLE `reportedissues`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `systemconfiguration`
--
ALTER TABLE `systemconfiguration`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notesattachments`
--
ALTER TABLE `notesattachments`
  ADD CONSTRAINT `notesattachments_ibfk_1` FOREIGN KEY (`NoteID`) REFERENCES `notesdetails` (`ID`);

--
-- Constraints for table `notesdetails`
--
ALTER TABLE `notesdetails`
  ADD CONSTRAINT `notesdetails_ibfk_1` FOREIGN KEY (`SellerID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `notesdetails_ibfk_2` FOREIGN KEY (`Status`) REFERENCES `referencedata` (`ID`),
  ADD CONSTRAINT `notesdetails_ibfk_3` FOREIGN KEY (`ActionedBy`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `notesdetails_ibfk_4` FOREIGN KEY (`Category`) REFERENCES `notecategories` (`ID`),
  ADD CONSTRAINT `notesdetails_ibfk_5` FOREIGN KEY (`NoteType`) REFERENCES `notetypes` (`ID`),
  ADD CONSTRAINT `notesdetails_ibfk_6` FOREIGN KEY (`Country`) REFERENCES `countries` (`ID`),
  ADD CONSTRAINT `notesdetails_ibfk_7` FOREIGN KEY (`IsPaid`) REFERENCES `referencedata` (`ID`);

--
-- Constraints for table `notesdownloads`
--
ALTER TABLE `notesdownloads`
  ADD CONSTRAINT `notesdownloads_ibfk_1` FOREIGN KEY (`NoteID`) REFERENCES `notesdetails` (`ID`),
  ADD CONSTRAINT `notesdownloads_ibfk_2` FOREIGN KEY (`Seller`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `notesdownloads_ibfk_3` FOREIGN KEY (`Downloader`) REFERENCES `users` (`ID`);

--
-- Constraints for table `notesreviews`
--
ALTER TABLE `notesreviews`
  ADD CONSTRAINT `notesreviews_ibfk_1` FOREIGN KEY (`NoteID`) REFERENCES `notesdetails` (`ID`),
  ADD CONSTRAINT `notesreviews_ibfk_2` FOREIGN KEY (`ReviewedByID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `notesreviews_ibfk_3` FOREIGN KEY (`AgainstDownloadsID`) REFERENCES `notesdownloads` (`ID`);

--
-- Constraints for table `reportedissues`
--
ALTER TABLE `reportedissues`
  ADD CONSTRAINT `reportedissues_ibfk_1` FOREIGN KEY (`NoteID`) REFERENCES `notesdetails` (`ID`),
  ADD CONSTRAINT `reportedissues_ibfk_2` FOREIGN KEY (`ReportedByID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `reportedissues_ibfk_3` FOREIGN KEY (`AgainstDownloadID`) REFERENCES `notesdownloads` (`ID`);

--
-- Constraints for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD CONSTRAINT `userprofile_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `userprofile_ibfk_2` FOREIGN KEY (`Gender`) REFERENCES `referencedata` (`ID`),
  ADD CONSTRAINT `userprofile_ibfk_3` FOREIGN KEY (`Country`) REFERENCES `countries` (`Name`),
  ADD CONSTRAINT `userprofile_ibfk_4` FOREIGN KEY (`PhonenNumberCountryCode`) REFERENCES `countries` (`CountryCode`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `userroles` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
