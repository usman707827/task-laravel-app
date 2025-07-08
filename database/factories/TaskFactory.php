<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $taskTemplates = [
            [
                'title' => 'System Update',
                'description' => 'Update the operating system to the latest version including security patches and performance improvements. Backup all important data before proceeding.'
            ],
            [
                'title' => 'Database Backup',
                'description' => 'Create a full backup of the production database and store it in the secure backup location. Verify backup integrity after completion.'
            ],
            [
                'title' => 'Code Review',
                'description' => 'Review the new authentication module code for security vulnerabilities and best practices. Check for proper error handling and input validation.'
            ],
            [
                'title' => 'Server Maintenance',
                'description' => 'Perform routine server maintenance including disk cleanup, log rotation, and service restart. Schedule during off-peak hours.'
            ],
            [
                'title' => 'Client Meeting',
                'description' => 'Discuss project requirements and timeline with the client. Present current progress and gather feedback for next iteration.'
            ],
            [
                'title' => 'Bug Fix - Login Issue',
                'description' => 'Fix the login authentication bug that prevents users from accessing their accounts. Issue reported by multiple users.'
            ],
            [
                'title' => 'API Documentation',
                'description' => 'Update the REST API documentation with new endpoints and authentication requirements. Include examples and error codes.'
            ],
            [
                'title' => 'Performance Optimization',
                'description' => 'Optimize database queries and improve application performance. Focus on reducing page load times and memory usage.'
            ],
            [
                'title' => 'Security Audit',
                'description' => 'Conduct a comprehensive security audit of the application including penetration testing and vulnerability assessment.'
            ],
            [
                'title' => 'Deploy to Production',
                'description' => 'Deploy the latest version to production environment after thorough testing. Monitor system performance post-deployment.'
            ],
            [
                'title' => 'User Training Session',
                'description' => 'Conduct training session for new users on how to use the task management system effectively. Prepare training materials.'
            ],
            [
                'title' => 'Data Migration',
                'description' => 'Migrate legacy data to the new database structure. Ensure data integrity and create mapping documentation.'
            ],
            [
                'title' => 'UI/UX Improvements',
                'description' => 'Implement user interface improvements based on user feedback. Focus on navigation and accessibility features.'
            ],
            [
                'title' => 'Email Notifications',
                'description' => 'Set up automated email notifications for task assignments and deadline reminders. Test email delivery system.'
            ],
            [
                'title' => 'Mobile App Testing',
                'description' => 'Test the mobile application on various devices and operating systems. Document any issues or compatibility problems.'
            ],
            [
                'title' => 'Content Management',
                'description' => 'Update website content including product descriptions, pricing information, and company news. Optimize for SEO.'
            ],
            [
                'title' => 'Network Configuration',
                'description' => 'Configure network settings for the new office location. Set up VPN access and security protocols.'
            ],
            [
                'title' => 'Inventory Management',
                'description' => 'Update inventory system with new product arrivals and adjust stock levels. Generate monthly inventory report.'
            ],
            [
                'title' => 'Team Standup Meeting',
                'description' => 'Weekly team standup to discuss project progress, blockers, and upcoming tasks. Share updates on current sprint.'
            ],
            [
                'title' => 'License Renewal',
                'description' => 'Renew software licenses for development tools and third-party services. Update license tracking spreadsheet.'
            ],
            [
                'title' => 'Report Generation',
                'description' => 'Generate monthly performance reports including user analytics, system uptime, and revenue metrics.'
            ],
            [
                'title' => 'Payment Integration',
                'description' => 'Integrate payment gateway for online transactions. Test payment processing with various payment methods.'
            ],
            [
                'title' => 'Social Media Update',
                'description' => 'Update social media profiles with latest company news and product announcements. Schedule upcoming posts.'
            ],
            [
                'title' => 'Backup Verification',
                'description' => 'Verify the integrity of all backup systems and test data recovery procedures. Document any issues found.'
            ],
            [
                'title' => 'Customer Support',
                'description' => 'Respond to customer support tickets and resolve technical issues. Update knowledge base with common solutions.'
            ],
            [
                'title' => 'SSL Certificate Renewal',
                'description' => 'Renew SSL certificates for all domains before expiration. Update certificate installation documentation.'
            ],
            [
                'title' => 'Feature Development',
                'description' => 'Develop new dashboard feature for task analytics and reporting. Include charts and data visualization.'
            ],
            [
                'title' => 'Quality Assurance',
                'description' => 'Perform quality assurance testing on the new feature before release. Create test cases and documentation.'
            ],
            [
                'title' => 'Server Monitoring',
                'description' => 'Set up monitoring alerts for server performance and resource usage. Configure notification thresholds.'
            ],
            [
                'title' => 'Documentation Update',
                'description' => 'Update technical documentation for the latest system changes. Include installation and configuration guides.'
            ]
        ];

        $template = $this->faker->randomElement($taskTemplates);
        $statuses = ['pending', 'in_progress', 'completed'];
        $priorities = ['low', 'medium', 'high'];

        return [
            'title' => $template['title'],
            'description' => $template['description'],
            'status' => $this->faker->randomElement($statuses),
            'user_id' => 1,
            'due_date' => $this->faker->dateTimeBetween('now', '+30 days'),
            'created_at' => $this->faker->dateTimeBetween('-30 days', 'now'),
            'updated_at' => now(),
        ];
    }
}
