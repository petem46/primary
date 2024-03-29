USE [fcatdb]
GO
/****** Object:  StoredProcedure [dbo].[sp_AttendancePAStudents19]    Script Date: 04/03/2020 20:22:46 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO




-- =============================================
-- Author:		Pete
-- Create date: Dec 2019
-- Description:	PA Students
-- =============================================
ALTER PROCEDURE [dbo].[sp_AttendancePAStudents19] 
	-- Add the parameters for the stored procedure here
	@startdate date = '2019-08-26', 
	@enddate date,
	@leavers int = 1,
	@school varchar(50) = '%',
	@status varchar(150) = 'Single %',
	@upn varchar(50) = '%'
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

    -- Insert statements for procedure here
SELECT school
    ,id, upn, surname, forename, year, reg, genderlabel, pplabel, sendlabel
    ,SUM([Present Mark]) present
    ,SUM(AEA) aea
    ,SUM([Authorised Absence]) abs
    ,SUM([Unauthorised Absence]) uabs
    ,COUNT(present) AS possible
    ,CAST((CONVERT(FLOAT,(SUM([Present Mark])+SUM(AEA))) / COUNT(present)) * 100 AS numeric(4,1)) 'percentage'
    ,CASE WHEN round((CONVERT(FLOAT,(SUM([Present Mark])+SUM(AEA))) / COUNT(present)) * 100,1) <= 90 THEN 1 ELSE 0 END AS PA
  FROM (
    SELECT s.school, s.id, s.upn, s.psurname surname, s.pforename forename, s.year, s.reg, s.genderlabel, s.pplabel, s.sendlabel 
      ,present
      ,CASE WHEN meaning = 'Present' THEN '1' ELSE 0 END AS 'Present Mark' 
      ,CASE WHEN meaning = 'Approved Educational Activity' THEN '1' ELSE 0 END AS 'AEA' 
      ,CASE WHEN meaning = 'Authorised Absence' THEN '1' ELSE 0 END AS 'Authorised Absence' 
      ,CASE WHEN meaning = 'Unauthorised Absence' THEN '1' ELSE 0 END AS 'Unauthorised Absence' 
      ,CASE WHEN meaning = 'Attendance not required' THEN '1' ELSE 0 END AS 'Attendance not required' 
      ,CASE WHEN meaning = 'No mark' THEN '1' ELSE 0 END AS 'No mark' 
    FROM attendance a
    LEFT JOIN students19 s ON a.upn = s.upn
where filterdate between @startdate and @enddate
and len(s.leavedate) < @leavers
and len(s.upn) > 3
and s.school like @school
and (s.status like @status or s.status IS NULL)
--and s.year IN ('0','1','2','3','4','5','6')
and s.upn like @upn
  ) AS att1
  WHERE upn IS NOT NULL
  GROUP BY school, id, upn, surname, forename, year, reg, genderlabel, pplabel, sendlabel
  HAVING COUNT(present) > 0 
  ORDER BY round((CONVERT(FLOAT,(SUM([Present Mark])+SUM(AEA))) / COUNT(present)) * 100,1) DESC, surname asc, forename asc
END


