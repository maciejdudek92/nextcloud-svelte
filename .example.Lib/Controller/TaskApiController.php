<?php
declare(strict_types=1);

namespace OCA\TodoBoilerplate\Controller;

use OCA\TodoBoilerplate\Service\TaskService;
use OCP\AppFramework\Controller; 
use OCP\AppFramework\Http\DataResponse;
use OCP\IRequest;
use OCP\IUserSession;

class TaskApiController extends Controller {

    public function __construct(
        string $appName,
        IRequest $request,
        private TaskService $service,
        private IUserSession $userSession
    ) {
        parent::__construct($appName, $request);
    }

    /**
     * @NoAdminRequired
     * @NoCSRFRequired
     * @CORS
     */
    public function index(): DataResponse {
        $user = $this->userSession->getUser();
        if (!$user) {
             return new DataResponse([], 401);
        }

        return new DataResponse(
            $this->service->findAll($user->getUID())
        );
    }

    /**
     * @NoAdminRequired
     * @NoCSRFRequired
     * @CORS
     */
    public function create(string $title): DataResponse {
        $user = $this->userSession->getUser();
        
        if (empty($title)) {
            return new DataResponse(['error' => 'Title must not be empty'], 400);
        }

        $task = $this->service->create($title, $user->getUID());
        return new DataResponse($task);
    }
}
