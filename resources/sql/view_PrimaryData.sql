SELECT school, wonggo, upn, psurname, pforename, year, reg, gender, pp, send, eal, genderlabel, pplabel, sendlabel,
ks1reading, ks1writing, ks1maths, ks1average, ks1averagevalue, subject, resultset, result, hasks1, PKG, WTS, EXS, GDS,
  CASE
    WHEN EXS = 1 THEN 1
    WHEN GDS = 1 THEN 1 ELSE 0 END AS [EXS+],
  CASE
    WHEN ks1averagevalue >= 7 THEN 'Higher'
    WHEN ks1averagevalue >= 4 THEN 'Middle'
    WHEN ks1averagevalue >= 1 THEN 'Lower'
  END AS priorability,
  CASE
    WHEN ks1readingvalue = '8' AND gds = 1 THEN 0
    WHEN ks1readingvalue = '8' AND exs = 1 THEN - 1
    WHEN ks1readingvalue = '8' AND wts = 1 THEN - 2
    WHEN ks1readingvalue = '8' AND pkg = 1 THEN - 2
    WHEN ks1readingvalue = '5' AND gds = 1 THEN 1
    WHEN ks1readingvalue = '5' AND exs = 1 THEN 0
    WHEN ks1readingvalue = '5' AND wts = 1 THEN - 1
    WHEN ks1readingvalue = '5' AND pkg = 1 THEN - 2
    WHEN ks1readingvalue = '3' AND gds = 1 THEN 2
    WHEN ks1readingvalue = '3' AND exs = 1 THEN 1
    WHEN ks1readingvalue = '3' AND wts = 1 THEN 0
    WHEN ks1readingvalue = '3' AND pkg = 1 THEN - 1
    WHEN ks1readingvalue = '1' AND pkg = 1 THEN 0
    WHEN ks1readingvalue = '1' AND wts = 1 THEN 1
    WHEN ks1readingvalue = '1' AND exs = 1 THEN 2
    WHEN ks1readingvalue = '1' AND gds = 1 THEN 2
  END AS progressvsreading,
  CASE
    WHEN ks1mathsvalue = '8' AND gds = 1 THEN 0
    WHEN ks1mathsvalue = '8' AND exs = 1 THEN - 1
    WHEN ks1mathsvalue = '8' AND wts = 1 THEN - 2
    WHEN ks1mathsvalue = '8' AND pkg = 1 THEN - 2
    WHEN ks1mathsvalue = '5' AND gds = 1 THEN 1
    WHEN ks1mathsvalue = '5' AND exs = 1 THEN 0
    WHEN ks1mathsvalue = '5' AND wts = 1 THEN - 1
    WHEN ks1mathsvalue = '5' AND pkg = 1 THEN - 2
    WHEN ks1mathsvalue = '3' AND gds = 1 THEN 2
    WHEN ks1mathsvalue = '3' AND exs = 1 THEN 1
    WHEN ks1mathsvalue = '3' AND wts = 1 THEN 0
    WHEN ks1mathsvalue = '3' AND pkg = 1 THEN - 1
    WHEN ks1mathsvalue = '1' AND pkg = 1 THEN 0
    WHEN ks1mathsvalue = '1' AND wts = 1 THEN 1
    WHEN ks1mathsvalue = '1' AND exs = 1 THEN 2
    WHEN ks1mathsvalue = '1' AND gds = 1 THEN 2
  END AS progressvsmaths,
  CASE
    WHEN ks1average = 'gds' AND gds = 1 THEN 0
    WHEN ks1average = 'gds' AND exs = 1 THEN - 1
    WHEN ks1average = 'gds' AND wts = 1 THEN - 2
    WHEN ks1average = 'gds' AND pkg = 1 THEN - 2
    WHEN ks1average = 'exs' AND gds = 1 THEN 1
    WHEN ks1average = 'exs' AND exs = 1 THEN 0
    WHEN ks1average = 'exs' AND wts = 1 THEN - 1
    WHEN ks1average = 'exs' AND pkg = 1 THEN - 2
    WHEN ks1average = 'wts' AND gds = 1 THEN 2
    WHEN ks1average = 'wts' AND exs = 1 THEN 1
    WHEN ks1average = 'wts' AND wts = 1 THEN 0
    WHEN ks1average = 'wts' AND pkg = 1 THEN - 1
    WHEN ks1average LIKE 'pk%' AND pkg = 1 THEN 0
    WHEN ks1average LIKE 'pk%' AND wts = 1 THEN 1
    WHEN ks1average LIKE 'pk%' AND exs = 1 THEN 2
    WHEN ks1average LIKE 'pk%' AND gds = 1 THEN 2
  END AS progress
FROM (
    SELECT s.school, s.upn + s.psurname + s.pforename + CONVERT(varchar, s.filterstartdate) AS wonggo, s.upn, s.psurname, s.pforename, s.year, s.reg, s.gender, s.pp, s.send, s.eal, s.genderlabel, s.pplabel, s.sendlabel,
    dbo.ks1.ks1reading, dbo.ks1.ks1writing, dbo.ks1.ks1maths, dbo.ks1.ks1readingvalue, dbo.ks1.ks1writingvalue, dbo.ks1.ks1mathsvalue, dbo.ks1.ks1average, dbo.ks1.ks1averagevalue, am.humanaspect AS subject, r.resultset, r.result,
    CASE
      WHEN ks1average IS NULL THEN 0
      ELSE 1
    END AS hasks1,
    CASE
      WHEN result = 'P6' THEN 1
      WHEN result = 'P7' THEN 1
      WHEN result = 'P8' THEN 1
      WHEN result = 'PKG' THEN 1
      WHEN result = '1' THEN 1
      WHEN result = 'WTS-' THEN 1
      ELSE 0
    END AS PKG,
    CASE
      WHEN result = '2' THEN 1
      WHEN result = '3' THEN 1
      WHEN result = 'WTS+' THEN 1
      WHEN result = 'WTS' THEN 1
      ELSE 0
    END AS WTS,
    CASE
      WHEN result = '6' THEN 1
      WHEN result = '5' THEN 1
      WHEN result = '4' THEN 1
      WHEN result = 'EXS+' THEN 1
      WHEN result = 'EXS' THEN 1
      WHEN result = 'EXS-' THEN 1
      ELSE 0
    END AS EXS,
    CASE
      WHEN result = '9' THEN 1
      WHEN result = '8' THEN 1
      WHEN result = '7' THEN 1
      WHEN result = 'GDS+' THEN 1
      WHEN result = 'GDS' THEN 1
      WHEN result = 'GDS-' THEN 1
      ELSE 0
    END AS GDS
  FROM dbo.results AS r
  LEFT OUTER JOIN dbo.students19 AS s ON r.upn = s.upn
  LEFT OUTER JOIN dbo.ks1 ON dbo.ks1.upn = s.upn
  LEFT OUTER JOIN dbo.aspect_matching AS am ON am.aspect = r.aspect
  WHERE (r.resultset LIKE 'Y' + s.year + ' DC%')
  AND (s.year IN ('R', '1', '2', '3', '4', '5', '6'))
  AND (r.aspect LIKE 'current %' OR r.aspect LIKE '%FCAT' OR r.aspect LIKE 'FCAT %')
  ) AS subQ
