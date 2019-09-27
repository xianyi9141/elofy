<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "view";
$route['404_override'] = 'erro404';
$route['mobile'] = "mobile";
$route['movel'] = "mobile";

//Service responsible for returning user data logged in.
$route['getUserLoggedIn'] = "service/getUserLoggedIn";
//Service responsible for returning global goals.
$route['getGlobalGoals'] = "service/getGlobalGoals";
//Service responsible for returning global goals by year.
$route['getGlobalGoalsYear'] = "service/getGlobalGoalsYear";
//Service responsible for returning global goals by year.
$route['getGlobalGoalsYearObjetivoPessoal'] = "service/getGlobalGoalsYearObjetivoPessoal";
$route['getGlobalChildGoalsYear'] 	= "service/getGlobalChildGoalsYear";
$route['getGlobalParentGoalsYear'] 	= "service/getGlobalParentGoalsYear";
$route['getObjectivoComments'] 		= "service/getObjectivoComments";
$route['getallcommentresponse'] 		= "service/getallcommentresponse";
$route['saveObjectivoComments'] 		= "service/saveObjectivoComments";
$route['saveObjectivoEmojiFaces'] 					= "service/saveObjectivoEmojiFaces";
$route['likeobjetivo'] 					= "service/likeobjetivo";
$route['updateRchaveDetails'] = "service/updateRchaveDetails";
$route['getGlobalsCycles'] = "service/getGlobalsCycles";

//generate PDF
$route['genpdf/(:any)'] 				= "service/pdfGen/$1";
$route['generateResultPDF'] = "service/generateResultPDF";

//reopen
$route['reOpenResult'] = "service/reOpenResult";
$route['saveReopenData'] = "service/saveReopenData";

//profile activity
$route['getActivityChartData1']		 	= "service/getActivityChartData1";
$route['getActivityChartData2']		 	= "service/getActivityChartData2";
$route['getAcivitiesProfileCareerHierarchy'] 	= "service/getAcivitiesProfileCareerHierarchy";
$route['getAcivitiesHierarchy'] 	= "service/getAcivitiesHierarchy";
$route['updateActivityProgress'] 		= "service/updateActivityProgress";
$route['updateActivityDetails'] 		= "service/updateActivityDetails";
$route['addActivityDetails'] 		= "service/addActivityDetails";
$route['updateSituationToFinished'] 		= "service/updateSituationToFinished";
$route['addActivityComment'] 			= "service/addActivityComment";
$route['getActivityComments'] 			= "service/getActivityComments";
$route['getActivityObjectives'] 			= "service/getActivityObjectives";
$route['getActivityResultados'] 			= "service/getActivityResultados";

//Service responsible for returning all user for company.
$route['getAllUserForCompany'] = "service/getAllUserForCompany";
$route['getAllUserFromCompanyByTypeOrLevel'] = "service/getAllUserFromCompanyByTypeOrLevel";
$route['getAllUserForCompanyId'] = "service/getAllUserForCompanyId";
$route['getAllUserForCompanyNotGivenId'] = "service/getAllUserForCompanyNotGivenId";
$route['getActivitiesAddedAlert'] = "service/getActivitiesAddedAlert";
$route['getCheckinAddedAlert'] = "service/getCheckinAddedAlert";
$route['getFeedbacksAlert'] = "service/getFeedbacksAlert";
$route['getSurveyPairAddedAlert'] = "service/getSurveyPairAddedAlert";
$route['getMatrizProjects'] = "service/getMatrizProjects";
$route['getMatrizProjectsForCompany'] = "service/getMatrizProjectsForCompany";
// $route['getMatrizProjectsForUser'] = "service/getMatrizProjectsForUser";
$route['insertMatrizProjects'] = "service/insertMatrizProjects";
$route['editMatrizProjects'] = "service/editMatrizProjects";

//Service responsible for returning all active user for company.
$route['getAllUserForCompanyActive'] = "service/getAllUserForCompanyActive";
$route['getAllUserForTeamProfile'] = "service/getAllUserForTeamProfile";
$route['getAllUsersCombo'] = "service/getAllUsersCombo";
$route['getAllUsersFromGestor'] = "service/getAllUsersFromGestor";
$route['getAllUsersFromGestorByCycle'] = "service/getAllUsersFromGestorByCycle";
$route['getGestors'] = "service/getGestors";
$route['getGestorsExceptGivenId'] = "service/getGestorsExceptGivenId";

//Service responsible for returnig user.
$route['getDetailsUser'] = "service/getDetailsUserById";
$route['getDetailsUsers'] = "service/getDetailsUserByIds";
//Service responsible for returnig all users.
$route['getUsersDetails'] = "service/getUsersDetails";
$route['getUserProfileById'] = "service/getUserProfileById";
//Service responsible for returnig cycles by year.
$route['getDataCycle'] = "service/getDataCycle";
//Service responsible for returnig years by company.
$route['getYearByCompany'] = "service/getYearByCompany";
$route['getYearWithIdByCompany'] = "service/getYearWithIdByCompany";
$route['getYearByCompanywithJanela'] = "service/getYearByCompanywithJanela";
//Service responsible for returnig all tags.
$route['getAllTags'] = "service/getAllTags";
//Service responsible for returnig all tags.
$route['getDetailsActivities'] = "service/getDetailsActivities";
//Service responsible for returnig all teams.
$route['getAllTeams'] = "service/getAllTeams";
$route['getAllTeamsAccordingPermission'] = "service/getAllTeamsAccordingPermission";
//Service responsible for returnig all competencia.
$route['getCompetenciaByIdEmperssaCargo'] = "service/getCompetenciaByIdEmperssaCargo";
//Service responsible for returnig all competencia.
$route['getQuestionarioByIdEmperssaCargo'] = "service/getQuestionarioByIdEmperssaCargo";
//Service responsible for removing questionarios.
$route['removeQuestionarioById'] = "service/removeQuestionarioById";
//Service responsible for removing questionarios.
$route['removeQuestionFromQuestionary'] = "service/removeQuestionFromQuestionary";
//Service responsible for removing questionarios.
$route['addOrUpdateQuestionario'] = "service/addOrUpdateQuestionario";
//Service responsible for adding questions.
$route['addOrUpdateQuestion'] = "service/addOrUpdateQuestion";
//Service responsible for returnig all competencia.
$route['getCargoByIdEmperssa'] = "service/getCargoByIdEmperssa";
//Service responsible for returnig all perguntas from qustionay.
$route['getQuestionsByQuestionaryId'] = "service/getQuestionsByQuestionaryId";
//Service responsible for returnig global gols by string tags.
$route['searchAllGlobalTaticsTag'] = "service/searchAllGlobalTaticsTag";
$route['searchTagUsersByTeam'] = "service/searchTagUsersByTeam";
//Service responsible for returnig global gols by string tags.
$route['getAllTeamsMembers'] = "service/getAllTeamsMembers";
$route['getIntegrationsByIdEmperssa'] = "service/getIntegrationsByIdEmperssa";
$route['getIntegrationsByType'] = "service/getIntegrationsByType";
$route['getAllSurvey'] = "service/getAllSurvey";
$route['getAllQuickSurvey'] 	= "service/getAllQuickSurvey";
$route['saveQuickSurvey'] 	= "service/saveQuickSurvey";
$route['saveNewSurvey'] 	= "service/saveNewSurvey";
$route['getSurveyQuestionsById'] 	= "service/getSurveyQuestionsById";
$route['getSurveyQuestionsBySurveyId'] 	= "service/getSurveyQuestionsBySurveyId";

$route['addCategory'] = "service/addCategory";
$route['getAllCategories'] = "service/getAllCategories";

$route['getQuestionarioByIdEmperssaCargos'] = "service/getQuestionarioByIdEmperssaCargos";
$route['testconnection'] = "service/testconnection";
$route['testsqlquery'] = "service/testsqlquery";
$route['updateAllKeyResultsDaily'] = "service/updateAllKeyResultsDaily";
$route['updateAllKeyResultsWeekly'] = "service/updateAllKeyResultsWeekly";
$route['updateAllKeyResultsMonthly'] = "service/updateAllKeyResultsMonthly";
$route['getCarreerById'] = "service/getCarreerById";
$route['getReceivedCarreerById'] = "service/getReceivedCarreerById";
$route['declineFeedbackbyId'] = "service/declineFeedbackbyId";
$route['archiveFeedbackbyId'] = "service/archiveFeedbackbyId";
$route['unarchiveFeedbackbyId'] = "service/unarchiveFeedbackbyId";
$route['approveObjective'] = "service/approveObjective";
$route['disapproveObjective'] = "service/disapproveObjective";
$route['resendObjective'] = "service/resendObjective";
$route['getAllDpObjectivos'] = "service/getAllDpObjectivos";
$route['getDpObjectivosDetailByIdObj'] 	= "service/getDpObjectivosDetailByIdObj";
$route['getDpMetaDetailsByMeta'] 		= "service/getDpMetaDetailsByMeta";
$route['saveGlobalDpForm'] 		= "service/saveGlobalDpForm";
$route['getDpActivitiesByMeta'] = "service/getDpActivitiesByMeta";
$route['getDpGoalDetailById'] = "service/getDpGoalDetailById";
$route['getDpMetaDetailByIdMeta'] = "service/getDpMetaDetailByIdMeta";
$route['getUserQuestionsForDevelopmentProfile'] 	= "service/getUserQuestionsForDevelopmentProfile";
$route['getUserDevQuestions'] 	= "service/getUserDevQuestions";
//Service responsible for returnig global gols by id.
$route['getDetailsGoalsById'] = "service/getDetailsGoalsById";
//Service responsible for returnig global gols tatics by id.
$route['getDetailsGoalsTaticsById'] = "service/getDetailsGoalsTaticsById";
//Service responsible for returnig global gols tatics by id.
$route['searchAllGlobalTaticByUser'] = "service/searchAllGlobalTaticByUser";
$route['searchObjectivesByGestor'] = "service/searchObjectivesByGestor";
$route['searchAllGlobalTaticByUserHierarchical'] = "service/searchAllGlobalTaticByUserHierarchical";
$route['searchMyAllGlobalTatic'] = "service/searchMyAllGlobalTatic";
$route['getImportKeyResults'] = "service/getImportKeyResults";
$route['getImportIndicadors'] = "service/getImportIndicadors";
$route['removeKeyresultContrataMetas'] = "service/removeKeyresultContrataMetas";
$route['getGoalsTaticsProfile'] 	= "service/getGoalsTaticsProfile";
$route['getKeyresultHistory'] 	= "service/getKeyresultHistory";
$route['editKeyresultHistory'] 	= "service/editKeyresultHistory";
$route['exportOkr'] 	= "service/exportOkr";
$route['marcarOkrReprovadoComoLido'] 	= "service/marcarOkrReprovadoComoLido";
$route['marcarOkrAprovadoComoLido'] 	= "service/marcarOkrAprovadoComoLido";
$route['getAcivitiesProfile'] 		= "service/getAcivitiesProfile";
$route['getAcivitiesProfileCareer'] 		= "service/getAcivitiesProfileCareer";
$route['getAcivityDetailProfileCareer'] 		= "service/getAcivityDetailProfileCareer";
$route['searchMyAllActivitiesOkr'] = "service/searchMyAllActivitiesOkr";
$route['downloadAllActivitiesOkr'] = "service/downloadAllActivitiesOkr";
$route['downloadAllCompetencia'] 	= "service/downloadAllCompetencia";
$route['getUserUpdatesProfile'] 		= "service/getUserUpdatesProfile";
$route['getSearchUserUpdatesProfile'] 		= "service/getSearchUserUpdatesProfile";
$route['searchUserDataProfile'] 		= "service/searchUserDataProfile";
$route['getUserUpdateByIDProfile'] 		= "service/getUserUpdateByIDProfile";
$route['getSearchUserUpdateByIDProfile'] 		= "service/getSearchUserUpdateByIDProfile";
$route['getUserStatusByIDProtocoloProfile'] 		= "service/getUserStatusByIDProtocoloProfile";
$route['getSearchUserStatusByIDProtocoloProfile'] 		= "service/getSearchUserStatusByIDProtocoloProfile";
$route['checkinStatusUpdateById'] 		= "service/checkinStatusUpdateById";
$route['deleteCommentProfile'] 		= "service/deleteCommentProfile";
$route['getUserQuestionsForUpdatesProfile'] 	= "service/getUserQuestionsForUpdatesProfile";
$route['getUserAnswersByIdForUpdatesProfile'] 	= "service/getUserAnswersByIdForUpdatesProfile";
$route['saveUserUpdateDataProfile'] 			= "service/saveUserUpdateDataProfile";
$route['saveUserUpdateDataCareer'] 			= "service/saveUserUpdateDataCareer";
$route['getUserDevelopmentUpdateByIDFeedback'] 	= "service/getUserDevelopmentUpdateByIDFeedback";
$route['getCareerForUser'] 	= "service/getCareerForUser";
$route['saveUserDevlopmentUpdateDataProfile'] 	= "service/saveUserDevlopmentUpdateDataProfile";
$route['updateFeedbackDeadline'] 				= "service/updateFeedbackDeadline";
$route['updateFeedbackPrivacyStatus'] 			= "service/updateFeedbackPrivacyStatus";
$route['addMinorGoals'] 						= "service/addMinorGoals";
$route['updateMinorGoals'] 						= "service/updateMinorGoals";
$route['replyUserDevlopmentUpdateDataProfile'] 	= "service/replyUserDevlopmentUpdateDataProfile";
$route['saveUserDpGoals'] 						= "service/saveUserDpGoals";
$route['updateUserDpMeta'] 					    = "service/updateUserDpMeta";
$route['updateUserDpActivity'] 					= "service/updateUserDpActivity";
$route['saveUserDpActivity'] 					= "service/saveUserDpActivity";
$route['updateUserDpObjetivoStatus'] 			= "service/updateUserDpObjetivoStatus";
$route['deleteUserDpActivity'] 					= "service/deleteUserDpActivity";
$route['deleteUserDpMeta'] 					    = "service/deleteUserDpMeta";
$route['updateUserMetaDp'] 					    = "service/updateUserMetaDp";
$route['updateUserActivityDp'] 					= "service/updateUserActivityDp";
$route['deleteUserDpObjective'] 				= "service/deleteUserDpObjective";
$route['getMyTimeForProfile'] 					= "service/getMyTimeForProfile";
$route['getMySearchTimeForPublicProfile'] 		= "service/getMySearchTimeForPublicProfile";
$route['saveUserCommentProfile'] 				= "service/saveUserCommentProfile";
$route['dismissAcivitiesProfile'] 				= "service/dismissAcivitiesProfile";
//Service responsible for returnig result keys.
$route['getDetailsKeyById'] = 'service/getDatailsKeyById';
//Service responsible for returng global tatics by company
$route['getTaticsGoals'] = 'service/getTaticsGoals';
$route['getCurrentUserTeamMember'] = 'service/get_current_user_team_member';
// get peoples for developement
$route['getPeopleDevelopement'] = 'service/getPeopleDevelopement';
$route['getAllQuestionsPeopleDevelopement'] = 'service/getAllQuestionsPeopleDevelopement';
$route['getSurveyDetailsForDevelopement'] = 'service/getSurveyDetailsForDevelopement';

// serviço que retorna os detalhes do time por id_time
$route['getTeamsDetails'] = 'service/getTeamsDetails';
$route['getCargoDetailsById'] = 'service/getCargoDetailsById';

// coleta os dados de todos os times da empresa em arvore
$route['getAllTeamsTree'] = 'service/getAllTeamsTree';



$route['getUsersNotInGivenCycle'] = 'service/getUsersNotInGivenCycle';
$route['getUsersForPeerSelection'] = 'service/getUsersForPeerSelection';
$route['getIdRevisaoCycleById'] = 'service/getIdRevisaoCycleById';
$route['addCycleParesUsers'] = 'service/addCycleParesUsers';
$route['addUsersForCycle'] = 'service/addUsersForCycle';
$route['saveCycleUsers'] = 'service/saveCycleUsers';


// add time
$route['addTeam'] = 'service/add_team';
$route['getMembersForTeams'] = 'service/getMembersForTeams';
$route['getAvalicaoDetailsById'] = 'service/getAvalicaoDetailsById';
$route['getProfileGoalDetailById'] = 'service/getProfileGoalDetailById';
$route['getAvalicaoDetailDetailById'] = 'service/getAvalicaoDetailDetailById';
$route['getMembersForTeamsUsers'] = 'service/getMembersForTeamsUsers';
// add cargo
$route['addCargo'] = 'service/addCargo';
// edit cargo
$route['editCargo'] = 'service/editCargo';
$route['saveEmpressa'] = 'service/saveEmpressa';
$route['saveEmpressaImage'] = 'service/saveEmpressaImage';
$route['getEmpressaDetail'] = 'service/getEmpressaDetail';
$route['getAllValoresEmpresa'] = 'service/getAllValoresEmpresa';
$route['saveValores'] = 'service/saveValores';
$route['getValoresById'] = 'service/getValoresById';
$route['editValores'] = 'service/editValores';
$route['deleteValorebyId'] = 'service/deleteValorebyId';
// eidta time
$route['editTeam'] = 'service/editar_team';
$route['getAllTeamsWithoutRelation'] = 'service/getAllTeamsWithoutRelation';
// add integration
$route['addIntegration'] = 'service/addIntegration';
// edit integration
$route['editIntegration'] = 'service/editIntegration';
$route['getIntegrationDetailsById'] = 'service/getIntegrationDetailsById';


//Service responsible for returnig global gols, tatics, key result, activities by id responsible.
$route['searchMyAllGlobalTaticProfile'] = "service/searchMyAllGlobalTaticProfile";


// ADS METODOS
$route['addObjetivoFavorito'] = "service/addObjetivoFavorito";

$route['removeObjetivoFavorito'] = "service/removeObjetivoFavorito";

$route['addObjetivoGlobal'] = "service/addObjetivoGlobal";

$route['getCycleByIdObjetivo'] = "service/getCycleByIdObjetivo";

$route['getCyclesByYear'] = "service/getCycleByYear";
$route['getCyclePeriod'] = "service/getCyclePeriod";
$route['getModifyCycleDetail'] = "service/getModifyCycleDetail";
$route['insertCiclo'] = "service/insertCiclo";
$route['editCiclo'] = "service/editCiclo";
$route['getCyclesIdByDate'] = "service/getCyclesIdByDate";
$route['getCylesForSettings'] = "service/getCylesForSettings";
$route['getRevisionCycleByCompany'] = "service/getRevisionCycleByCompany";
$route['getSingleScoresByRevisaoCicloId'] = "service/getSingleScoresByRevisaoCicloId";
$route['getUserAveragesScores'] = "service/getUserAveragesScores";
$route['saveCalibratedScores'] = "service/saveCalibratedScores";
$route['saveCalibratedAverage'] = "service/saveCalibratedAverage";
$route['saveScoreSuggestion'] = "service/saveScoreSuggestion";


$route['getUserWithoutTeam'] = "service/get_user_without_team";

$route['editFeed'] = "service/edit_feed";

$route['getMyFeedProfile'] = "service/getMyFeedProfile";

$route['getRChavePendentByUser'] = "service/getRChavePendentByUser";

$route['getGlobalsTree'] = "service/getGlobalsTree";


// Elo Methods
$route['setElo'] = "service/setElo";
$route['getUnreadElosTotal'] = "service/getUnreadElosTotal";
$route['getElosByCompanyId'] = "service/getElosByCompanyId";
$route['getElosIHaveBeenMentioned'] = "service/getElosIHaveBeenMentioned";
$route['markEloAsRead'] = "service/markEloAsRead";
$route['getElosStatsFromCurrentUser'] = "service/getElosStatsFromCurrentUser";
$route['likeElo'] = "service/likeElo";
$route['deleteFeed'] = "service/deleteFeed";
$route['editFeed'] = "service/editFeed";
$route['commentElo'] = "service/commentElo";
$route['getEloComments'] = "service/getEloComments";
$route['getLikesFromElo'] = "service/getLikesFromElo";
$route['getLastNotifications'] = "service/getLastNotifications";
$route['getCycleNotifications'] = "service/getCycleNotifications";

// ADS METODOS 22/07

$route['editNameGlobal'] = "service/editarNomeGlobal";
$route['editResponsableGlobal'] = "service/editarResponsavelGlobal";
$route['editColorObjetive'] = "service/editarCorObjetivo";
$route['editDescriptionObjetive'] = "service/editarDescricaoObjetivo";
$route['editGoalParentData'] = "service/editGoalParentData";
$route['getUserTeam'] = "service/getUserTeam";
$route['removeCoResponsableGlobal'] = "service/removerCoResponsavelGlobal";
$route['addCoResponsableGlobal'] = "service/addCoResponsavelGlobal";
$route['removeTagObjetive'] = "service/removerTagObjetivo";
$route['addTagObjetive'] = "service/addTagObjetivo";
$route['editTeamsPesos'] = "service/editarTimesPesos";
$route['editarTeamsObjetive'] = "service/editarTimeObjetivo";

$route['addObjetiveTatic'] 			= "service/addObjetivoTaticos";
$route['addObjetiveTaticProfile'] 	= "service/addObjetivoTaticos";
$route['updateEstrategico'] 		= "service/updateEstrategico";
// metodos de remoção
$route['removeObjetiveGlobal'] = "service/removerObjetivo";
$route['removeObjetiveTatic'] = "service/removerObjetivo";
$route['editPesoTatic'] = "service/editarPesoTaticos";

$route['editNameTatic'] = "service/editarNomeGlobal";
$route['editTypeTatic'] = "service/editTypeTatic";
$route['removeCycleTatic'] = "service/removeCycleTatic";
$route['removeSharedTeam'] = "service/removeSharedTeam";
$route['addCycleTatic'] = "service/addCycleTatic";
$route['addSharedTeamTatic'] = "service/addSharedTeamTatic";
$route['editStatusTatic'] = "service/editStatusTatic";
$route['editTagsTatic'] = "service/editTagsTatic";
$route['editAtivoTatic'] = "service/editAtivoTatic";
$route['editCorTatic'] = "service/editCorTatic";
$route['editProgress'] = "service/editProgress";
$route['sp_avaliacao_desempenho'] = "service/sp_avaliacao_desempenho";
$route['editResponsableTatic'] = "service/editarResponsavelGlobal";
$route['removeCoResponsableTatic'] = "service/removerCoResponsavelGlobal";
$route['addCoResponsableTatic'] = "service/addCoResponsavelGlobal";
$route['editDescriptionTatic'] = "service/editarDescricaoObjetivo";
$route['addTagTatic'] = "service/addTagObjetivo";
$route['removeTagTatic'] = "service/removerTagObjetivo";
$route['editCyclesTatic'] = "service/editarCiclosTatico";

$route['deleteResultadoChave'] = "service/deleteResultadoChave";
$route['addResultadoChave'] = "service/addResultadoChave";
$route['addIndicador'] = "service/addIndicador";
$route['importResultadoChave'] = "service/importResultadoChave";
$route['editResultadoChave'] = "service/editarResultadoChave";
$route['removeResultadoChave'] = "service/removeResultadoChave";

$route['addMedicao'] = "service/add_medicao";
$route['getMedicaoByIdRChave'] = "service/getMedicaoByIdRChave";
$route['getMedicaosByIdKey'] = "service/getMedicaosByIdKey";
$route['getContratosByIdKey'] = "service/getContratosByIdKey";
$route['update_user'] = "service/update_user";


$route['addAtividade'] = "service/addAtividade";
$route['editAtividade'] = "service/editaAtividade";
// Metodo de Remoção de Atividade
$route['removeAtividade'] = "service/removerAtividade";


//Service responsible for returning user data logged in.
$route['getAdminusuariosTime'] = "service/getAdminusuariosTime";
$route['getmyteammembers'] = "service/getmyteammembers";
$route['getAffordableTeams'] = "service/getAffordableTeams";
$route['getAffordableUsers'] = "service/getAffordableUsers";
$route['getNonadminusuariosTime'] = "service/getNonadminusuariosTime";
$route['getLastEvaluations'] = "service/getLastEvaluations";
$route['getUserPotential'] = "service/getUserPotential";
$route['getMyCompenciasProfile'] = "service/getMyCompenciasProfile";
$route['getMySkillsProfile'] = "service/getMySkillsProfile";
$route['getMyFeedbacksProfile'] = "service/getMyFeedbacksProfile";
$route['getFeedbackById'] = "service/getFeedbackById";
$route['getFeedbackNotification'] = "service/getFeedbackNotification";
$route['getFeedbackReplyNotification'] = "service/getFeedbackReplyNotification";
$route['readFeedbackNotification'] = "service/readFeedbackNotification";
$route['readFeedbackReplyNotification'] = "service/readFeedbackReplyNotification";
$route['getUserFeedbacksProfile'] = "service/getUserFeedbacksProfile";
$route['getMyGivenFeedbacksProfile'] = "service/getMyGivenFeedbacksProfile";
$route['getMyPrivateNotesProfile'] = "service/getMyPrivateNotesProfile";
$route['getMyRequestedFeedbacksProfile'] = "service/getMyRequestedFeedbacksProfile";
$route['getMyRequestedFeedbacksByMe'] = "service/getMyRequestedFeedbacksByMe";
$route['getMyPerformancePotentialProfile'] = "service/getMyPerformancePotentialProfile";
$route['getUserSkills'] = "service/getUserSkills";
$route['getUserSkillsForReview'] = "service/getUserSkillsForReview";
$route['getUserPDI'] = "service/getUserPDI";
$route['saveNewPerformance'] = "service/saveNewPerformance";
$route['saveCurrentSession'] = "service/saveCurrentSession";
$route['savePotentialAnswers'] = "service/savePotentialAnswers";
$route['saveSkills'] = "service/saveSkills";
$route['saveGeral'] = "service/saveGeral";
$route['getUserGoalsForReviewProfile'] = "service/getUserGoalsForReviewProfile";
$route['getUserGoals'] = "service/getUserGoals";
$route['getGoalsByParentIdOkr'] = "service/getGoalsByParentIdOkr";
$route['updateTodoProfile'] = "service/updateTodoProfile";
$route['getCycleReviewTime'] = "service/getCycleReviewTime";
$route['updateDesempnhoById'] = "service/updateDesempnhoById";
$route['updateValoreSkillsById'] = "service/updateValoreSkillsById";
$route['savePotentialAnswersForReviewProfile'] = "service/savePotentialAnswersForReviewProfile";
$route['getUserPotentialForReviewProfile'] = "service/getUserPotentialForReviewProfile";
$route['updateFinalReviewById'] = "service/updateFinalReviewById";
$route['getUserValoresForReview'] = "service/getUserValoresForReview";
$route['getUserPDIReview'] = "service/getUserPDIReview";
$route['userpotentialByCycle'] = "service/userpotentialByCycle";
/**
 * @raptor
 */
$route['getPesquisaByUsuario'] = "service/getPesquisaByUsuario";
$route['getPublicPesquisaByUsuario'] = "service/getPublicPesquisaByUsuario";
$route['getPublicPesquisaToSelect'] = "service/getPublicPesquisaToSelect";
$route['getQuestionarios'] = "service/getQuestionarios";
$route['getUsersByTeams'] = "service/getUsersByTeams";
$route['getTeamsByTeamsId'] = "service/getTeamsByTeamsId";
$route['getUsersByIds'] = "service/getUsersByIds";
$route['getAllGestor'] = "service/getAllGestor";
$route['getAllCargos'] = "service/getAllCargos";
$route['getAllCategory'] = "service/getAllCategory";
$route['getAllTeamsPesquisa'] 	= "service/getAllTeamsPesquisa";
$route['getAllTagsPesquisa'] 	= "service/getAllTagsPesquisa";
$route['getAllSurveyPesquisa'] 	= "service/getAllSurveyPesquisa";
$route['getEvaluatedUsersBySurveyId'] 	= "service/getEvaluatedUsersBySurveyId";
$route['getAllPergunta'] 	= "service/getAllPergunta";
$route['getUsersTeamsList'] = "service/getUsersTeamsList";
$route['getPesquisaById'] = "service/getPesquisaById";
$route['clSurvey'] = "service/clSurvey";
$route['setPesquisaOfUsuario1'] = "service/setPesquisaOfUsuario1";
$route['addPublicOfUsuario'] = "service/addPublicOfUsuario";
$route['sendPesquisaMessage'] = "service/sendPesquisaMessage";
$route['getPesquisaFullInfoById'] = "service/getPesquisaFullInfoById";
$route['getQuestionList'] = "service/getQuestionList";
$route['getFilterCatPerguntaGester'] = "service/getFilterCatPerguntaGester";
$route['getPesquisaRespostasList'] = "service/getPesquisaRespostasList";
$route['getPesquisaRespostasTypeQ'] = "service/getPesquisaRespostasTypeQ";
$route['getPesquisaRespostasTypeO'] = "service/getPesquisaRespostasTypeO";
$route['getRatingDatas10'] = "service/getRatingDatas10";
$route['getAdesaoPesquisa'] = "service/getAdesaoPesquisa";
$route['getMatrixCategoryTeam'] = "service/getMatrixCategoryTeam";
$route['getMatrixQuestionTeam'] = "service/getMatrixQuestionTeam";
$route['getMatrixQuestionGestor'] = "service/getMatrixQuestionGestor";
$route['getMatrixCategoryGestor'] = "service/getMatrixCategoryGestor";
$route['getRatingDatas5'] = "service/getRatingDatas5";
$route['getGlabalRatingDatas10'] = "service/getGlabalRatingDatas10";
$route['getGlabalRatingDatas5'] = "service/getGlabalRatingDatas5";
$route['exportPesquisaRespostasList'] = "service/exportPesquisaRespostasList";
$route['csvDownloadRevisaoCicloStore'] = "service/csvDownloadRevisaoCicloStore";
$route['csvDownloadFeedbacks'] = "service/csvDownloadFeedbacks";
$route['exportPeopleDevelopement'] = "service/exportPeopleDevelopement";
$route['getAllFeedbacksByCompany'] = "service/getAllFeedbacksByCompany";
$route['getFeedbackChartData'] = "service/getFeedbackChartData";
$route['getFeedbackComments'] 			= "service/getFeedbackComments";
$route['addFeedbackComment'] 			= "service/addFeedbackComment";
$route['getAllKeyResults'] 				= "service/getAllKeyResults";
$route['getRchaveHistory'] 				= "service/getRchaveHistory";
$route['saveRchaveHistory'] 			= "service/saveRchaveHistory";
$route['saveRchaveHistoryHeader'] 		= "service/saveRchaveHistoryHeader";
$route['addRchaveHistoryHeader'] 		= "service/addRchaveHistoryHeader";
$route['saveRchaveHistoryValues'] 		= "service/saveRchaveHistoryValues";
$route['getRchaveHistoryDetailsById']	= "service/getRchaveHistoryDetailsById";
$route['getObjectives'] 				= "service/getObjectives";
$route['getCodigoes'] 					= "service/getCodigoes";
$route['getRchaveHistoricNames'] 		= "service/getRchaveHistoricNames";
$route['csvDownloadIndicators'] = "service/csvDownloadIndicators";


$route['getResultadosDetailsById'] = "service/getResultadosDetailsById";
$route['editKeyresultDetailMedicao'] = "service/editKeyresultDetailMedicao";

$route['saveCycleConfiguration'] 				= "service/saveCycleConfiguration";
$route['getCycleConfigList'] 					= "service/getCycleConfigList";
$route['getRavisaoCicloById'] 					= "service/getRavisaoCicloById";
$route['getUsersByCycleConfig'] 				= "service/getUsersByCycleConfig";
$route['getCycleConfigUsersByTypeValidation'] 	= "service/getCycleConfigUsersByTypeValidation";
$route['getCycleConfigUsersByCycleId'] 			= "service/getCycleConfigUsersByCycleId";
$route['getCycleConfigUsersByFilter'] 			= "service/getCycleConfigUsersByFilter";
$route['getCycles'] 							= "service/getCycles";
$route['getCycleByCycleId'] 					= "service/getCycleByCycleId";
$route['getCycleByCycleIdProfileBanner'] 		= "service/getCycleByCycleIdProfileBanner";
$route['updateRevisaoUsersAutorizado'] 			= "service/updateRevisaoUsersAutorizado";
$route['getCycleUsersByType'] 					= "service/getCycleUsersByType";
$route['getCycleUsersByTypeId'] 				= "service/getCycleUsersByTypeId";
$route['getSelfAddedCycleUsersByTypeId'] 		= "service/getSelfAddedCycleUsersByTypeId";
$route['getAlreadyAddedUsersByCycleId'] 		= "service/getAlreadyAddedUsersByCycleId";
$route['getUserIAmGestorOrPeer'] 				= "service/getUserIAmGestorOrPeer";
$route['getCycleReviewers'] 					= "service/getCycleReviewers";
$route['getUserFeedbacksByCycleId'] 			= "service/getUserFeedbacksByCycleId";
$route['getUserGoalsByCycleId'] 				= "service/getUserGoalsByCycleId";
$route['saveAutorizar'] 						= "service/saveAutorizar";
$route['updateSituacao'] 						= "service/updateSituacao";
$route['saveDeautorizar'] 						= "service/saveDeautorizar";
$route['sendCycleEmailToUsers'] 				= "service/sendCycleEmailToUsers";
$route['sendCycleReviewEmail'] 					= "service/sendCycleReviewEmail";
$route['sendNotaEmail'] 					    = "service/sendNotaEmail";
$route['getFasesByCycleId'] 					= 'service/getFasesByCycleId';
$route['getFasesDetailsForUser'] 				= 'service/getFasesDetailsForUser';
$route['getQuestionDataProfile'] 				= 'service/getQuestionDataProfile';
$route['getCompetenciasDataProfile'] 			= 'service/getCompetenciasDataProfile';
$route['saveApprisialFaseData'] 				= 'service/saveApprisialFaseData';
$route['saveApprisialFinish'] 					= 'service/saveApprisialFinish';
$route['saveApprisialFaseParesData'] 			= 'service/saveApprisialFaseParesData';
$route['saveApprisialFaseCompetenciasData'] 	= 'service/saveApprisialFaseCompetenciasData';
$route['saveApprisialFaseValoresData'] 			= 'service/saveApprisialFaseValoresData';
$route['getAllApprisialValores'] 				= 'service/getAllApprisialValores';
$route['getComponentType'] 						= 'service/getComponentType';
$route['addUpdateCycleUsers'] 					= "service/addUpdateCycleUsers";
$route['getCyclePercentage'] 					= "service/getCyclePercentage";
$route['getTipoFaseById'] 						= "service/getTipoFaseById";
$route['getTipoFaseScoreById'] 					= "service/getTipoFaseScoreById";
$route['getEscalaByEmpresaId'] 					= "service/getEscalaByEmpresaId";
$route['getRevisoesByEmpresaId'] 				= "service/getRevisoesByEmpresaId";
$route['addCycle'] 								= "service/addCycle";
$route['getNiveisByEmpresaId'] 					= "service/getNiveisByEmpresaId";
$route['getNineBoxes'] 							= "service/getNineBoxes";
$route['getReguaByCycleId'] 					= "service/getReguaByCycleId";



// METODOS DE ALERTA
$route['getAlerts'] = "service/get_alerts";


// AVALIACOES
$route['getAvaliacoes'] = "service/getAvaliacoes";
$route['getOkrAvaliacoes'] = "service/getOkrAvaliacoes";
$route['getUserAvaliacoes'] = "service/getUserAvaliacoes";
$route['editAvaliacao'] = "service/editarAvaliacaoObjetivo";
$route['insertMyFeedbackProfile'] = "service/insertMyFeedbackProfile";
$route['insertMyPrivateNoteProfile'] = "service/insertMyPrivateNoteProfile";
$route['requestFeedbackProfile'] = "service/requestFeedbackProfile";
$route['getUserForFeedback'] = "service/getUserForFeedback";
$route['getAllSkillsByCompanyID'] = "service/getAllSkillsByCompanyID";
$route['getAllSkillsByCompanyIDCargo'] = "service/getAllSkillsByCompanyIDCargo";
$route['addNewSkillsByCompanyId'] = "service/addNewSkillsByCompanyId";
$route['addNewSkillsByCompanyIdWithoutGeralCargo'] = "service/addNewSkillsByCompanyIdWithoutGeralCargo";
$route['getCargos'] = "service/getCargos";
$route['changeObjectivoStatusById'] = "service/changeObjectivoStatusById";



/**
 * @Category Routes.
 */
$route['saveCategory'] 			= 'service/saveCategory';
$route['getCategories'] 		= 'service/getCategories';
$route['getCategory'] 			= 'service/getCategory';

/**
 * @Category Routes.
 */
$route['saveCompetencia'] 		= 'service/saveCompetencia';
$route['getCompetencias'] 		= 'service/getCompetencias';
$route['getCompetencia'] 		= 'service/getCompetencia';
$route['searchCompetencia'] 	= 'service/searchCompetencia';
$route['GetAllCompetenciasTipos'] 	= 'service/GetAllCompetenciasTipos';

$route['update_tipo'] 	= 'service/update_tipo';
$route['add_tipo'] 	= 'service/add_tipo';


// Metodos Login/Logout
$route['logar'] = 'user/validate_credentials_service';
$route['survey-logar'] = 'user/survey_validate_credentials_service';
$route['logout'] = 'user/logout';
$route['survey-logout'] = 'user/survey_logout';
$route['maf_confirm'] = 'user/maf_confirm';

//Metodos de Cadastro/Recupearação/Confirmação de senha
$route['cadastrar'] = 'usuarios/usuarioCadastroService';
$route['new_user_data'] = 'usuarios/add_usuario_empresaService';
$route['editUserData'] = 'usuarios/edit_usuario_empresaService';
$route['changeUserPasswordProfile'] = 'service/change_user_password';
$route['editUserImg'] = 'usuarios/edit_usuario_logo_empresa';
$route['recuperar_senha'] = 'usuarios/usuarioRecPassService';
$route['redefinir_senha'] = 'usuarios/usuarioRedefinirSenha';
$route['redefinir_senha/(:any)'] = 'usuarios/usuarioRedefinirSenha/$1';
$route['redefinir_email/(:any)'] = 'usuarios/usuarioRedefinirEmail/$1';
$route['redefinir_senha_service/(:any)'] = 'usuarios/recover_passService/$1';
$route['confirmaEmail/(:any)'] = 'usuarios/confirmaEmail/$1';
$route['primeiro_acesso'] = 'usuarios/primeiroAcessoService';

// VIEW

$route['login'] = 'view/index';
$route['survey-login'] = 'view/survey_login';
$route['survey-list/(:any)'] = 'view/survey_list/$1';
$route['goelofy'] = 'view/cadastro';
$route['dashboard'] = 'view/dashboard';
$route['planejamento'] = 'view/planejamento';
$route['my_dashboard'] = 'view/my_dashboard';
$route['tags'] = 'view/tags';
$route['okr'] = 'view/okr';
$route['okr/(:any)'] = 'view/okr/$1';
$route['okr2/(:any)/(:any)'] = 'view/okr2/$1/$1';
$route['feed'] = 'view/feed';
$route['avaliacoes'] = 'view/avaliacoes';
$route['checkin'] = 'view/checkin';
$route['carreira'] = 'view/carreira';
$route['carreira/(:num)'] = 'view/carreira/$1';
$route['carreira/(:num)/(:num)'] = 'view/carreira/$1/$2';
$route['carreira/(:num)/(:num)/(:num)'] = 'view/carreira/$1/$2/$3';
$route['performance_dashboard'] = 'view/performance_dashboard';
$route['peopledevelopment'] = 'view/peopledevelopment';
$route['usuarios'] = 'view/usuarios';
$route['questionarios'] = 'view/questionarios';
$route['zapier'] = 'view/zapier';
$route['results'] = 'view/results';
$route['ninebox'] = 'view/ninebox';
$route['nineboxdetail'] = 'view/nineboxdetail';
$route['cargos'] = 'view/cargos';
$route['cargosv1'] = 'view/cargos';
$route['my-survey'] = 'view/mysurvey/$1';
$route['survey'] = 'view/survey/$1';
$route['empresa'] = 'view/empresa';
$route['integrations'] = 'view/integrations';
$route['times'] = 'view/times';
$route['perfil'] = 'view/perfil';
$route['atividades'] = 'view/atividades';
$route['carreira'] = 'view/carreira';
$route['perfil/(:num)'] = 'view/perfil/$1';
$route['perfil/activity'] = 'view/perfil';   //init activity
$route['profile'] = 'view/profile';
$route['index'] = 'view/principalTemp';
$route['feedback'] = 'view/feedback';
$route['canais/(:any)'] = 'view/canais/$1';
$route['organograma/(:any)'] = 'view/organograma/$1';
$route['feedbacks'] = 'view/feedbacks';
$route['indicators'] = 'view/indicators';
$route['rchavehistory/(:any)'] = 'view/rchavehistory/$i';
$route['ciclos'] = 'view/ciclos';
$route['matriz'] = 'view/matriz';
/**
 * @raptor add Pesquisas menu
 */
$route['pesquisas'] = 'view/pesquisas';
$route['pesquisas/(:any)'] = 'view/pesquisas/$1';
$route['pesquisa/(:any)/question'] = 'view/pesquisaquestion/$1';


/**
 * @Category View Routes.
 */
$route['category'] 		= 'view/category';
/**
 * @CategoryCompetencias View Routes.
 */
$route['competencias'] 	= 'view/competencia';


$route['getAllRevisaoCiclo'] = 'service/getAllRevisaoCiclo';
$route['getRevisaoCicloPerformanceDoTime'] = 'service/getRevisaoCicloPerformanceDoTime';
$route['getYouTimeByUserCycle'] = 'service/getYouTimeByUserCycle';
$route['getYouTimeByIdProtocol'] = 'service/getYouTimeByIdProtocol';
$route['getYouTimeNotification'] = 'service/getYouTimeNotification';
$route['closeYouTimeByIdProtocol'] = 'service/closeYouTimeByIdProtocol';
$route['confirmYouTimeByIdProtocol'] = 'service/confirmYouTimeByIdProtocol';
$route['getAllRevisaoCiclo9Box'] = 'service/getAllRevisaoCiclo9Box';
$route['updateNineBoxByUser'] = 'service/updateNineBoxByUser';
$route['updateNineBoxDetailsByUser'] = 'service/updateNineBoxDetailsByUser';
$route['resetNineBoxCalibrado'] = 'service/resetNineBoxCalibrado';
$route['getCareerVisibleByCycle'] = 'service/getCareerVisibleByCycle';
$route['getResultsFromUserByCycle'] = 'service/getResultsFromUserByCycle';
$route['getValoresFromUsuarioByCycle'] = 'service/getValoresFromUsuarioByCycle';
$route['getPotencialFromUsuarioByCycle'] = 'service/getPotencialFromUsuarioByCycle';
$route['getOutraEtapaFromUsuarioByCycle'] = 'service/getOutraEtapaFromUsuarioByCycle';
$route['getEvaluationAccess'] = 'service/getEvaluationAccess';
$route['grantEvaluationAccess'] = 'service/grantEvaluationAccess';
$route['revokeEvaluationAccess'] = 'service/revokeEvaluationAccess';
$route['getResultadoFromUsuarioByCycle'] = 'service/getResultadoFromUsuarioByCycle';
$route['getCompetenciaFromUsuarioByCycle'] = 'service/getCompetenciaFromUsuarioByCycle';
$route['getCommentsByValue'] = 'service/getCommentsByValue';
$route['getCommentsByResultado'] = 'service/getCommentsByResultado';
$route['getCommentsByPotencial'] = 'service/getCommentsByPotencial';
$route['getCommentsByCompetencia'] = 'service/getCommentsByCompetencia';
$route['getCommentsByOutraEtapa'] = 'service/getCommentsByOutraEtapa';
$route['getAllCyclesByUser'] = 'service/getAllCyclesByUser';
$route['getLastCycleByUser'] = 'service/getLastCycleByUser';
$route['getGraphData'] = 'myDashboard/getGraphData';
$route['filterChartAndObjectivos'] = 'myDashboard/filterChartAndObjectivos';
$route['getAllCurrentCycles'] = "myDashboard/getAllCurrentCycles";

/**
 * @Cycle Configuration Routes.
 */
$route['cycleconfiguration'] 		= 'view/cycleconfiguration';
$route['cycleconfiguration/(:any)'] = 'view/cycleconfiguration/$1';
$route['gerenciar/(:any)'] = 'view/gerenciar/$1';

// METODOS DASHBOAR
$route['getDashboard'] = 'dashboardService/index';
$route['GetReviewById'] = 'dashboardService/GetReviewById';


// CHAT
$route['getCanaisByUserId'] = 'chatService/getCanaisByUserId';
$route['getCanaisByEmpresaId'] = 'chatService/getCanaisByEmpresaId';
$route['getUserRelatedToCanal'] = 'chatService/getUserRelatedToCanal';
$route['getUserAbleToRelateToCanal'] = 'chatService/getUserAbleToRelateToCanal';
$route['getDetailsCanalMessagesByIdCanal'] = 'chatService/getDetailsCanalMessagesByIdCanal';
$route['addCanal'] = 'chatService/addCanal';
$route['editCanal'] = 'chatService/editCanal';
$route['addUsuarioCanal'] = 'chatService/addUsuarioCanal';
$route['addUsuariosCanal'] = 'chatService/addUsuariosCanal';
$route['editUsuarioCanal'] = 'chatService/editUsuarioCanal';
$route['getMensagensCanal'] = 'chatService/getMensagensCanal';
$route['seachMensagemCanal'] = 'chatService/seachMensagemCanal';
$route['addMessage'] = 'chatService/addMessage';
$route['editMessage'] = 'chatService/editMessage';
$route['getUserParticipantByString'] = 'chatService/getUserParticipantByString';

$route['listarCitacoes'] = 'chatService/listarCitacoes';



/* EXEMPLO PARA DANIEL */

/*

$route['admin/login/add/(:any)'] = 'login/add/$1';
$route['admin/login/update'] = 'login/update';
$route['admin/login/update/(:any)'] = 'login/update/$1';
$route['admin/login/delete/(:any)'] = 'login/delete/$1';
$route['admin/login/(:any)'] = 'login/index/$1'; //$1 = page number


$route['admin/usuario'] = 'usuario/index';
$route['admin/usuario/add'] = 'usuario/add';
$route['admin/usuario/add/(:any)'] = 'usuario/add/$1';
$route['admin/usuario/update'] = 'usuario/update';
$route['admin/usuario/update/(:any)'] = 'usuario/update/$1';
$route['admin/usuario/delete/(:any)'] = 'usuario/delete/$1';
$route['admin/usuario/(:any)'] = 'usuario/index/$1'; //$1 = page number

*/

/* ZAPIER */
$route['usuario/add-user-from-zapier'] = 'usuario/add-from-zapier';
$route['usuario/zapier-pool'] = 'usuario/zapierPool';
$route['generateZapierToken'] = 'service/generateZapierToken';
$route['getZapierToken'] = 'service/getZapierToken';
$route['generateApiToken'] = 'service/generateApiToken';
$route['getApiToken'] = 'service/getApiToken';

/*portal*/
//$route[''] = 'portal/index';




/* End of file routes.php */
/* Location: ./application/config/routes.php */
/* social login routes */ 
$route['google_login'] 			= 'socialLogin/google_login';
$route['linkedin_login'] 		= 'socialLogin/linkedin_login';
$route['slack_login'] 			= 'socialLogin/slack_login';
$route['outlook_login'] 		= 'socialLogin/outlook_login';
$route['removeSocialAccount'] 	= 'service/removeSocialAccount';
$route['setUserProfilePicture'] 	= 'service/setUserProfilePicture';
$route['cancelToSaveImage'] 	= 'service/cancelToSaveImage';

$route['api/login'] = 'api/login';
$route['geral/entities/movimentacao'] = 'api/movimentacao';

$route['(:any)'] = 'view/$1';