# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class ParentsChildrenCertificateDetail(models.Model):
    _name = 'parents.children.certificate.detail'
    _description = 'Parents and Children Certification Detail Model'
    declarer_id              = fields.Many2one('citizen', string="Declarer's Full Name")
    children_id               = fields.Many2one('citizen', string="Children's Full name")                        
    parent_id                = fields.Many2one('citizen', string="Father's full name")
    mother_id                = fields.Many2one('citizen', string="Mother's full name")
    issue_by                 = fields.Char('Issue By')
    issue_date               = fields.Date('Issue Day')