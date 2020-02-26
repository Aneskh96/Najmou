<?php
namespace UserBundle\Redirection;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
class AfterLoginRedirection implements AuthenticationSuccessHandlerInterface
{
    /**
     * @var \Symfony\Component\Routing\RouterInterface
     */
    private $router;
    /**
     * @param RouterInterface $router
     */
    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }
    /**
     * @param Request $request
     * @param TokenInterface $token
     * @return RedirectResponse
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
// Get list of roles for current user
        $roles = $token->getRoles();
// Tranform this list in array
        $rolesTab = array_map(function($role){
            return $role->getRole();
        }, $roles);
// If is a admin or super admin we redirect to the backoffice area
        if  (in_array('ROLE_SUPER_ADMIN', $rolesTab, true))
            $redirection = new RedirectResponse($this->router->generate('admin_homepage'));
        elseif(in_array('ROLE_IND_E', $rolesTab, true) )
            $redirection = new RedirectResponse($this->router->generate('indexinde_homepage'));
// otherwise, if is a commercial user we redirect to the crm area
        elseif (in_array('ROLE_ASS_E', $rolesTab, true))
            $redirection = new RedirectResponse($this->router->generate('indexasse_homepage'));
// otherwise we redirect user to the member area
        elseif(in_array('ROLE_SOC_E', $rolesTab, true) )
            $redirection = new RedirectResponse($this->router->generate('indexsoce_homepage'));
        elseif(in_array('ROLE_IND_R', $rolesTab, true) )
            $redirection = new RedirectResponse($this->router->generate('indexindr_homepage'));
// otherwise, if is a commercial user we redirect to the crm area
        elseif (in_array('ROLE_ASS_R', $rolesTab, true))
            $redirection = new RedirectResponse($this->router->generate('indexassr_homepage'));
// otherwise we redirect user to the member area
        elseif(in_array('ROLE_SOC_R', $rolesTab, true) )
            $redirection = new RedirectResponse($this->router->generate('indexsocr_homepage'));
        else
            $redirection = new RedirectResponse($this->router->generate('user_homepage'));
        return $redirection;
    }
}