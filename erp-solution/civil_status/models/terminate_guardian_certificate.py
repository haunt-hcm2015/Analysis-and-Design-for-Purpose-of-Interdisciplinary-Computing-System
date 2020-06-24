# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class TerminateGuardianCertification(models.Model):
    _name = 'terminate.guardian.certification'
    _description = 'Terminate Guardian Certification Model'
    terminate_guardian_number = fields.Char('Terminate Guardian Certificate Number')
    country                  = fields.Many2one('country')
    city                     = fields.Many2one('city')
    commune                  = fields.Many2one('commune')
    state                    = fields.Selection([
                                ('process', 'In Process'), 
                                ('done', 'Done')
                            ])