# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class DeathCertificationDetail(models.Model):
    _name = 'death.certification.detail'
    _description = 'Death Certification Detail Model'
    death_certificate_id     = fields.Many2one('death.certificate', string="Death Certificate Info")   
    death_person_id          = fields.Many2one('citizen', string="Full Name")                        
    declarer_id              = fields.Many2one('citizen', string="Declarer's Full Name")
    issue_date               = fields.Date('Issue Date')
    issue_by                 = fields.Char('Issue By')