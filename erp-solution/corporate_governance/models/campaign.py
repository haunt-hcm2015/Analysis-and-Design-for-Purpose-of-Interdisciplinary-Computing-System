# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Campaign(models.Model):
    _name = 'governance.campaign'
    _description = 'Campaign Model'
    name = fields.Char('Campaign Name')
    customer_campaign_ids = fields.One2many('governance.customer.campaign', 'campaign_id', string='Customer in Campaign')
    objectives = fields.Char()
    sponsor = fields.Many2many('res.partner', string='Partner')
    start_date = fields.Date('Compaign Start Date')
    end_date = fields.Date('Compaign End Date')
class CustomerCampaign(models.Model):
    _name = 'governance.customer.campaign'
    _description = 'Customer Campaign Model'
    customer_id = fields.Many2one('accounting.customer',string='Customer')
    campaign_id = fields.Many2one('governance.campaign',string='Campaign')
    contact_date = fields.Date()
    contact_outcome = fields.Selection([
        ('satisfactory', 'Satisfactory'),
        ('unsatisfactory', 'Unsatisfactory')
    ], 'Contact Outcome')
    contact_status = fields.Selection([
        ('new', 'New'),
        ('completed', 'Completed'),
        ('cancelled','Cancelled')
    ], 'Contact Status')
    _sql_constraints = [('customer_campaign_unique','unique(customer_id, campaign_id)','Unique between customer campaign rows')]
class CustomerCampaignOrder(models.Model):
    _name = 'governance.customer.campaign.order'
    _description = 'Customer Campaign Order Model'
    customer_campaign_id = fields.Many2one('governance.customer.campaign', string='Customer in Campaign')
    order_id = fields.Many2one('governance.order.sale', string='Order')
  