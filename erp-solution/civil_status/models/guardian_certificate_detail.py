# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class GuardianCertificateDetail(models.Model):
    _name = 'guardian.certificate.detail'
    _description = 'Guardian Certification Detail Model'
    guardian_certificate_id     = fields.Many2one('guardian.certificate', string="Guardian Certificate Info")   
    guadians_person_id          = fields.Many2one('citizen', string="Guadians Full Name")   
    children_guadians        = fields.Many2one('citizen', string="Children Full Name") 
    declarer_id              = fields.Many2one('citizen', string="Declarer's Full Name")
    issue_date               = fields.Date('Issue Date')
    issue_by                 = fields.Char('Issue By')