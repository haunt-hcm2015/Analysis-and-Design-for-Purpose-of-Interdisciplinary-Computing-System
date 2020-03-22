# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class TerminateGuardianCertificateDetail(models.Model):
    _name = 'terminate.guardian.certificate.detail'
    _description = 'Terminate Guardian Certification Detail Model'
    terminate_guardian_certificate_id     = fields.Many2one('terminate.guardian.certificate', string="Terminate Guardian Certificate Info")   
    guadians_person_id          = fields.Many2one('citizen', string="Guadians Full Name")   
    children_guadians        = fields.Many2one('citizen', string="Children Full Name") 
    declarer_id              = fields.Many2one('citizen', string="Declarer's Full Name")
    issue_date               = fields.Date('Issue Day')
    expired_date             = fields.Date('Expired Day')
    issue_by                 = fields.Char('Issue By')