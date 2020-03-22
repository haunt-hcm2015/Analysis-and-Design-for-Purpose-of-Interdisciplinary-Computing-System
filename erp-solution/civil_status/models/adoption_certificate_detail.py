# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class AdoptionCertificationDetail(models.Model):
    _name = 'adoption.certification.detail'
    _description = 'Adoption Certification Detail Model'
    adoption_certificate_id     = fields.Many2one('adoption.certificate', string="Adoption Certificate Info")   
    citizen_id                  = fields.Many2one('citizen', string="Full Name")  
    transferor_id               = fields.Many2one('citizen', string="Transferor Name")      
    parent_adoption_id          = fields.Many2one('citizen', string="Father Adoption's Name")
    mother_adoption_id          = fields.Many2one('citizen', string="Mother Adoption's Name")
    issue_date                  = fields.Date('Issue Date')
    issue_by                    = fields.Char('Issue By')

